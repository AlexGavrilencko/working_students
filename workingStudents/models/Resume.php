<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resume".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property int $city_id
 * @property string $dateBirth
 * @property string $image
 * @property string $skills
 * @property string $addinform
 * @property int $personalQualities_id
 * @property int $CareerObjective_id
 * @property string $dateAdd
 * @property string $dateChanges
 * @property int $ShowOrHide
 * @property string $response
 *
 * @property Experience[] $experiences
 * @property Response[] $responses
 * @property Attributes $personalQualities
 * @property Attributes $careerObjective
 * @property Attributes $city
 * @property User $user
 * @property Scanned[] $scanneds
 */
class Resume extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resume';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'city_id', 'personalQualities_id', 'CareerObjective_id', 'ShowOrHide'], 'integer'],
            [['dateBirth', 'dateAdd', 'dateChanges'], 'safe'],
            [['skills', 'addinform'], 'string'],
            [['name', 'surname', 'patronymic', 'image', 'response'], 'string', 'max' => 255],
            [['personalQualities_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributes::className(), 'targetAttribute' => ['personalQualities_id' => 'id']],
            [['CareerObjective_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributes::className(), 'targetAttribute' => ['CareerObjective_id' => 'id']],
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
            'user_id' => 'User ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'city_id' => 'Город',
            'dateBirth' => 'Дата рождения',
            'image' => 'Фото',
            'skills' => 'Навыки',
            'personalQualities_id' => 'Персональные качества',
            'CareerObjective_id' => 'Желаемая должность',
            'dateAdd' => 'Дата добавления',
            'dateChanges' => 'Дата редактирования',
            'ShowOrHide' => 'Показывать\Скрывать',
            'response' => 'Отклик',
        ];
    }
    public function create()
    {
        return $this->save(false);
    }
    public function findModel($id)
    {
        if (($model = resume::findOne($id)) !== null) {
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
    public function getExperiences()
    {
        return $this->hasMany(Experience::className(), ['resume_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponses()
    {
        return $this->hasMany(Response::className(), ['resume_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalQualities()
    {
        return $this->hasOne(Attributes::className(), ['id' => 'personalQualities_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCareerObjective()
    {
        return $this->hasOne(Attributes::className(), ['id' => 'CareerObjective_id']);
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
    public function getScanneds()
    {
        return $this->hasMany(Scanned::className(), ['resume_id' => 'id']);
    }
}
