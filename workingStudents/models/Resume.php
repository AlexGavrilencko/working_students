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
 * @property string $personalQualities_id
 * @property int $CareerObjective_id
 * @property string $dateAdd
 * @property string $dateChanges
 * @property int $ShowOrHide
 * @property string $response
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
            [['user_id', 'city_id', 'CareerObjective_id', 'ShowOrHide'], 'integer'],
            [['dateBirth', 'dateAdd', 'dateChanges'], 'safe'],
            [['skills', 'personalQualities_id'], 'string'],
            [['name', 'surname', 'patronymic', 'image', 'response'], 'string', 'max' => 255],
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
}
