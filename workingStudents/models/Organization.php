<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
/**
 * This is the model class for table "organization".
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 * @property string $adres
 * @property string $inn
 * @property string $ogrn
 * @property string $image
 */
class Organization extends ActiveRecord
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
            [['city_id','user_id'], 'integer'],
            [['name', 'adres', 'inn', 'ogrn', 'image'], 'string', 'max' => 255],
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
            'inn' => 'ИНН',
            'ogrn' => 'ОГРН',
            'image' => 'Логотип',
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
    
}
