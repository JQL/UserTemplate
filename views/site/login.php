<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
  <h1><?= Html::encode($this->title) ?></h1>

  <p>Please fill out the following fields to login:</p>

  <?php
  $form = ActiveForm::begin([
      'id' => 'login-form',
      'options' => ['class' => 'form-horizontal'],
      'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-md-3\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-md-1 control-label'],
      ],
  ]);
  ?>

  <?= $form->field($model, 'username') ?>

  <?= $form->field($model, 'password')->passwordInput() ?>
<div class="col-md-offset-2" style="color:#999;">
  <?=
  $form->field($model, 'rememberMe', [
    'template' => "<div class=\"col-md-offset-2\">{input}</div>\n<div class=\"col-md-10\">{error}</div>",
  ])->checkbox()
  ?>
</div>
  <div class="form-group">
    <div class="col-md-offset-1 col-md-11">
      <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
  </div>
  <!--  <div style="color:#999;margin:1em 0"> -->
  <div class="col-md-offset-1 col-md-4">
    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
  </div>

  <?php ActiveForm::end(); ?>

  <!--  <div class="col-md-offset-1" style="color:#999;">
      You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
      To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>-->
</div>
