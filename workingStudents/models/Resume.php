<?php

namespace app\models;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

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
 * @property string $personalQualities
 * @property int $CareerObjective_id
 * @property string $dateAdd
 * @property string $dateChanges
 * @property int $ShowOrHide
 * @property int $viewed
 *
 * @property Experience[] $experiences
 * @property Response[] $responses
 * @property Position $careerObjective
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
            [['name', 'surname', 'patronymic', 'CareerObjective_id','city_id','user_id','ShowOrHide','skills', 'addinform','personalQualities'], 'required'],
            [['user_id', 'city_id', 'CareerObjective_id', 'ShowOrHide','viewed'], 'integer'],
            [['dateBirth'], 'safe'],
            [['dateAdd'], 'date', 'format'=>'php:Y-m-d'],
            [['dateAdd'], 'default', 'value' => date('Y-m-d')],
            [['dateChanges'], 'date', 'format'=>'php:Y-m-d'],
            [['dateChanges'], 'default', 'value' => date('Y-m-d')],
            [['skills', 'addinform','personalQualities'], 'string'],
            [['name', 'surname', 'patronymic', 'image', 'response'], 'string', 'max' => 255],
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
            'personalQualities' => 'Персональные качества',
            'CareerObjective_id' => 'Желаемая должность',
            'dateAdd' => 'Дата добавления',
            'dateChanges' => 'Дата редактирования',
            'ShowOrHide' => 'Показывать\Скрывать',
            'response' => 'Отклик',
            'addinform' => 'Дополнительная информация',
            'viewed' => 'Просмотры',
        ];
    }

    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dateAdd', 'dateChanges'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['dateChanges'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    
    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->dateAdd);
	}
    
    public function getDateChanges()
    {
        return Yii::$app->formatter->asDate($this->dateChanges);
	}
    public function create()
    {
        return $this->save(false);
    }
    public static function getSearch($query)
	{
        //var_dump($query);
		$pageSize = 5;
        $count = $query->count();
        

		$pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);

		$resume = $query->offset($pagination->offset)
		->limit($pagination->limit)
		->all();
        //var_dump($vacancy);
		$data['resume'] = $resume;
		$data['pagination'] = $pagination;

		return $data;
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

    public function viewedCounter()
    {
        $this->viewed += 1;
        return $this->save(false);
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
    public function getCareerObjective()
    {
        return $this->hasOne(Position::className(), ['id' => 'CareerObjective_id']);
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

    public static function getAll($pageSize = 5)
	{
		$query = Resume::find();

		$count = $query->count();

		$pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);

		$resume = $query->offset($pagination->offset)
		->limit($pagination->limit)
		->all();

		$data['resume'] = $resume;
		$data['pagination'] = $pagination;

        return $data;
	}


}
