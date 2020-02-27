<?php

namespace app\models;

use yii\base\Model;

//class SignupForm extends yii\base\Model {  // **error Class 'app\models\yii\base\Model' not found to slove this  extends \yii\base\Model keep front slash for yii
class SignupForm extends Model {

    public $username;
    public $password;
    public $password_repeat;

    // this  is client site validatation
    public function rules() {
        return [
            [['username', 'password', 'password_repeat'], 'required'],
            [['username', 'password', 'password_repeat'], 'string', 'min' => 3, 'max' => 100],
            ['password_repeat', 'compare', 'compareAttribute' => 'password']
        ];
    }

    public function signup() {
        $user = new User();
        $user->username = $this->username;
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);
        $user->access_token = \Yii::$app->security->generateRandomString();
        $user->auth_key = \Yii::$app->security->generateRandomString();
        
        if($user->save()){
            return true;
        }
        
        \Yii::error("Unable to save user". \yii\helpers\VarDumper::dumpAsString($user->errors));
                
    }

}
