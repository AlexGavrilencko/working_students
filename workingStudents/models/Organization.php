<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $city_id
 * @property string $adres
 * @property string $inn
 * @property string $ogrn
 * @property string $image
 * @property int $correctOrg
 *
 * @property Attributes $city
 * @property User $user
 * @property Vacancy[] $vacancies
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'city_id', 'correctOrg'], 'integer'],
            [['name', 'adres', 'inn', 'ogrn', 'image'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributes::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'ID User',
            'name' => 'Наименование организации',
            'city_id' => 'Город',
            'adres' => 'Адрес',
            'inn' => 'ИН',
            'ogrn' => 'ОГРН',
            'image' => 'Логотип',
            'correctOrg' => 'correctOrg',
        ];
    }

   
    public function create()
    {
        return $this->save(false);
    }

    public function findModel($id)
    {
        if (($model = organization::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/' . $this->image : '/no-image.png';
    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->image);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(Attributes::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancy::className(), ['organization_id' => 'id']);
    }
}
