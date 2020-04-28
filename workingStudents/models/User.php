<?php

namespace app\models;
use yii\web\IdentityInterface;
use \yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $e_mail
 * @property string $phone
 * @property int $ActInactUser
 * @property int $rang
 * @property string $auth_key
 *
 * @property Article[] $articles
 * @property Organization[] $organizations
 * @property Project[] $projects
 * @property Response[] $responses
 * @property Resume[] $resumes
 * @property Scanned[] $scanneds
 * @property Vacancy[] $vacancies
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ActInactUser', 'rang'], 'integer'],
            [['login', 'password', 'e_mail', 'phone', 'auth_key'], 'string', 'max' => 255],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'e_mail' => 'Электронная почта',
            'phone' => 'Телефон',
            'ActInactUser' => 'Act Inact User',
            'rang' => 'Rang',
            'auth_key' => 'Auth Key',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

   
    public static function findByEmail($e_mail)
    {
        return User::find()->where(['e_mail'=>$e_mail])->one();
    }

    public static function findByLogin($login)
    {
        return User::find()->where(['login'=>$login])->one();
    }

    public function create()
    {
        $this->save();
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function findModel($id)
    {
        if (($model = user::findOne($id)) !== null) {
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
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organization::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponses()
    {
        return $this->hasMany(Response::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResumes()
    {
        return $this->hasMany(Resume::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScanneds()
    {
        return $this->hasMany(Scanned::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancy::className(), ['user_id' => 'id']);
    }
}
