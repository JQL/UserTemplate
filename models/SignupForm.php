<?php

namespace app\models;

use app\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model {

  public $username;
  public $email;
	public $email_repeat;
  public $password;
  public $password_repeat;
  //public $common_passwords = array("PASSWORD", "123456", "12345678", "123456789", "QWERTY", "BASEBALL", "LETMEIN", "ACCESS", "MASTER", "PASSWORD123", "TRUSTNO1", "MONKEY", "ABC123");

  /**
   * @inheritdoc
   */
  public function attributeLabels() {
    return [
      'username' => Yii::t('app', 'Username'),
      'email' => Yii::t('app', 'Email address'),
      'email_repeat' => Yii::t('app', 'Repeat email address'),
      'password' => Yii::t('app', 'Password'),
      'password_repeat' => Yii::t('app', 'Repeat password'),
    ];
  }

  /**
   * @inheritdoc
   */
  public function rules() {
    return [
      ['username', 'filter', 'filter' => 'trim'],
      ['username', 'required'],
      ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => Yii::t('app', 'This username has already been taken.')],
      ['username', 'string', 'min' => 2, 'max' => 32],
      [['email', 'email_repeat'], 'filter', 'filter' => 'trim'],
      [['email', 'email_repeat'], 'required'],
      ['email', 'email'],
      ['email_repeat', 'compare', 'compareAttribute' => 'email', 'message' => Yii::t('app', 'The email addresses don\'t match')],
      ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => Yii::t('app', 'This email address has already been taken.')],
      [['password', 'password_repeat'], 'filter', 'filter' => 'trim'],
      [['password', 'password_repeat'], 'required'],
      [['password', 'password_repeat'], 'string', 'min' => 6],
      //[mb_strtoupper(['password']), 'in', 'range' => ['common_passwords'], 'message' => Yii::t('app', 'Stronger password is required')],
      ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('app', 'The passwords don\'t match')],
    ];
  }

  /**
   * Signs user up.
   *
   * @return User|null the saved model or null if saving fails
   */
  public function signup() {
    if ($this->validate()) {
      $user = new User();
      $user->username = $this->username;
      $user->email = $this->email;
      $user->setPassword($this->password);
      $user->generateAuthKey();
      if ($user->save()) {
        return $user;
      }
    }

    return null;
  }

}
