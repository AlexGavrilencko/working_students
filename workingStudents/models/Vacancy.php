<?php

namespace app\models;

use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "vacancy".
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property int $organization_id
 * @property int $city_id
 * @property int $experience_id
 * @property int $employment_id
 * @property int $schedule_id
 * @property int $salary
 * @property int $position_id
 * @property string $duties
 * @property string $requirement
 * @property string $conditions
 * @property int $category_id
 * @property string $dateAdd
 * @property string $dateChanges
 * @property int $WorkOrPractice
 * @property int $ShowOrHide
 * @property string $description
 * @property int $viewed
 *
 * @property Response[] $responses
 * @property Scanned[] $scanneds
 * @property Profstand $category
 * @property Attributes $city
 * @property Attributes $employment
 * @property Attributes $experience
 * @property Organization $organization
 * @property Position $position
 * @property Attributes $schedule
 * @property User $user
 */
class Vacancy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacancy';
    }
    
     
    
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','duties', 'requirement', 'conditions', 'description','user_id','categprof_id', 'organization_id', 'city_id', 'experience_id', 'employment_id', 'schedule_id', 'salary', 'position_id', 'category_id', 'WorkOrPractice', 'ShowOrHide'], 'required'],
            [['user_id', 'organization_id', 'city_id', 'experience_id', 'employment_id', 'schedule_id', 'salary', 'position_id', 'category_id', 'WorkOrPractice', 'ShowOrHide', 'viewed'], 'integer'],
            [['name','duties', 'requirement', 'conditions', 'description'], 'string'],
            [['dateAdd'], 'date', 'format'=>'php:Y-m-d'],
            [['dateAdd'], 'default', 'value' => date('Y-m-d')],
            [['dateChanges'], 'date', 'format'=>'php:Y-m-d'],
            [['dateChanges'], 'default', 'value' => date('Y-m-d')],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profstand::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributes::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['employment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributes::className(), 'targetAttribute' => ['employment_id' => 'id']],
            [['experience_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributes::className(), 'targetAttribute' => ['experience_id' => 'id']],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organization_id' => 'id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_id' => 'id']],
            [['schedule_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributes::className(), 'targetAttribute' => ['schedule_id' => 'id']],
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
            'name' => 'Наименование',
            'user_id' => 'User ID',
            'organization_id' => 'Organization ID',
            'city_id' => 'Город',
            'experience_id' => 'Опыт работы',
            'employment_id' => 'Тип занятости',
            'schedule_id' => 'График работы',
            'salary' => 'Заработанная плата',
            'position_id' => 'Должность',
            'duties' => 'Обязанности',
            'requirement' => 'Требования',
            'conditions' => 'Условия',
            'category_id' => 'Категория',
            'dateAdd' => 'Дата добавления',
            'dateChanges' => 'Дата изменения',
            'WorkOrPractice' => 'Предложение по работе или практике',
            'ShowOrHide' => 'Показать или скрыть',
            'description' => 'Описание',
            'viewed' => 'Количнство просмотров',
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

    

    public function create()
    {
        return $this->save(false);
    }
    


	public static function getAll($pageSize = 5)
	{
		$query = Vacancy::find();

		$count = $query->count();

		$pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);

		$vacancy = $query->offset($pagination->offset)
		->limit($pagination->limit)
		->all();

		$data['vacancy'] = $vacancy;
		$data['pagination'] = $pagination;

		return $data;
    }
    

    public static function getSearch($query)
	{
        //var_dump($query);
		$pageSize = 5;
        $count = $query->count();
        

		$pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);

		$vacancy = $query->offset($pagination->offset)
		->limit($pagination->limit)
		->all();
        //var_dump($vacancy);
		$data['vacancy'] = $vacancy;
		$data['pagination'] = $pagination;

		return $data;
	}


    public function viewedCounter()
    {
        $this->viewed += 1;
        return $this->save(false);
    }

    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponses()
    {
        return $this->hasMany(Response::className(), ['vacancy_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScanneds()
    {
        return $this->hasMany(Scanned::className(), ['vacancy_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Profstand::className(), ['id' => 'category_id']);
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
    public function getEmployment()
    {
        return $this->hasOne(Attributes::className(), ['id' => 'employment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExperience()
    {
        return $this->hasOne(Attributes::className(), ['id' => 'experience_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['id' => 'organization_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedule()
    {
        return $this->hasOne(Attributes::className(), ['id' => 'schedule_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
