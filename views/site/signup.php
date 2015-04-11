<?php
/*
 * Copyright ©2015 JQL all rights reserved.
 * No part of this site may be reproduced without prior permission.
 * http://www.jql.co.uk
 */
/*
  Created on : 04-Apr-2015, 17:50:56
  Author     : John Lavelle
  Title      : signup
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
  <h1><?= Html::encode($this->title) ?></h1>

  <p><?php echo Yii::t('app', 'Please complete <strong>all</strong> the following fields to signup:'); ?></p>

<!--  <div class="row">
    <div class="col-md-5"> -->
      <?php $form = ActiveForm::begin([
				'id' => 'form-signup',
      'options' => ['class' => 'form-horizontal'],
      'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-md-3\">{input}</div>\n<div class=\"col-md-7\">{error}</div>",
        'labelOptions' => ['class' => 'col-md-2 control-label'],
				],
				]); ?>
      <?= $form->field($model, 'username') ?>
      <?= $form->field($model, 'email')->input('email', ['placeholder'=>'Enter your email address']) ?>
      <?= $form->field($model, 'email_repeat', [
    'template' => "{label}\n<div class=\"col-md-3\">{input}</div>\n<div class=\"col-md-7\">{error}</div>", 'labelOptions' => ['class' => 'col-md-2 control-label'],
  ])->input('email', ['placeholder'=>'Re-type your email address']) ?>
      <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password - min 6 characters']) ?>
      <?= $form->field($model, 'password_repeat', [
    'template' => "{label}\n<div class=\"col-md-3\">{input}</div>\n<div class=\"col-md-7\">{error}</div>", 'labelOptions' => ['class' => 'col-md-2 control-label'],
  ])->passwordInput(['placeholder'=>'Re-type your password']) ?>
      <div class="form-group">
				<div class="col-md-offset-2 col-md-10">
					<?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
				</div>
      </div>
      <?php ActiveForm::end(); ?>
    <!-- </div>
  </div>  -->
</div>
<script type="text/javascript">
// a very basic system to stop pasting in the repeat fields.
	window.onload = function() {
	var elements = ['signupform-email_repeat', 'signupform-password_repeat'];
	for(i =0; i < elements.length; i++) { 
		document.getElementById(elements[i]).onpaste = function(e) {
			e.preventDefault();
			}
		}
	}
</script>
	<?php
/* End of file signup.php */
/* Location: ./views/site/signup.php */
            