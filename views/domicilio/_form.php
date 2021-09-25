<?php

use yii\helpers\Html;
use app\models\Usuario;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Domicilio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="domicilio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dom_ciudad')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dom_colonia')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dom_calle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dom_numExt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dom_numInt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dom_telefono')->textInput(['maxlength' => true]) ?>

    <?php /*$form->field($model, 'dom_fkusuario')->textInput()*/ ?>
    
  <?=    $form->field($model, 'dom_fkusuario')->widget(Select2::classname(), [
    'data' => Usuario::map(),
    'language' => 'es',
    'options' => ['placeholder' => 'selecciona el usuario ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);?>
    

    <?= $form->field($model, 'dom_fkcp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
