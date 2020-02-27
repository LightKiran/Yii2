<?php

namespace app\models;

use Yii;

//use yii\db\ActiveRecord;

/**
 * This is the model class for table "article_user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {
//    public $id;
//    public $username;
//    public $password;
//    public $authKey;
//    public $accessToken;
//    private static $users = [
//        '100' => [
//            'id' => '100',
//            'username' => 'admin',
//            'password' => 'admin',
//            'authKey' => 'test100key',
//            'accessToken' => '100-token',
//        ],
//        '101' => [
//            'id' => '101',
//            'username' => 'demo',
//            'password' => 'demo',
//            'authKey' => 'test101key',
//            'accessToken' => '101-token',
//        ],
//    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'article_user';
    }

    /**
     * {@inheritdoc}
     */
    
    // this is serve site validation
    public function rules() {
        return [
//            [['username', 'password', 'auth_key', 'access_token'], 'required'],
            [['username', 'password', 'auth_key', 'access_token'], 'string', 'min' => 3, 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }

    /*
      Scope Resolution Operator (::)

      In simpler terms, the double colon, is a token that allows access
      to static, constant, and overridden properties or methods of a class.

     */

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id) {

//        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
//        return self::find()->where(['id' => $id])->one();
        return self::findOne($id);

//     Use $this to refer to the current object. Use self to refer to the current class.   
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null) {
//        foreach (self::$users as $user) {
//            if ($user['accessToken'] === $token) {
//                return new static($user);
//            }
//        }
//
//        return null;

        return self::find()->where(['access_token' => $token])->one();
//        return self::findone(['username' => $username]); // can be short handed like this
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
//        foreach (self::$users as $user) {
//            if (strcasecmp($user['username'], $username) === 0) {
//                return new static($user);
//            }
//        }
//
//        return null;
        return self::findone(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId() {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey() {
//        return $this->authKey;
        return $this->auth_key; // must be same as database table column name
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey) {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password) {
//        return $this->password === $password; // this check plain password
        return Yii::$app->security->validatePassword($password, $this->password);
    }

}
