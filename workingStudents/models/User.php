<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use \yii\db\ActiveRecord;
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
            [['e_mail', 'phone'], 'string', 'max' => 255],
            [['password', 'login'],'string', 'min' => 8, 'max' => 32], //длинна от 8 до 32 символов
            [['phone'], 'filter', 'filter' => function ($value) {
                $result = preg_replace("/(\+7)(\d{3})(\d{3})(\d{2})(\d{2})/", "$1 ($2) $3-$4-$5", $value);
                return $result;
            }],
            [['login'], 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'login'], //имя(логин) уникально
            [['e_mail'], 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'e_mail'], //имя(логин) уникально
            ['e_mail', 'email'], //емэил это емэил
            [['phone'], 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'phone'], //телефон уникальный
            ['image', 'image', 'extensions' => 'jpg,png',
                'minWidth' => 400, 'maxWidth' => 2000,
                'minHeight' => 400, 'maxHeight' =>2000,
            ],//изображение определенного файла и размера
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



}
