<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatTipo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-tipo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tip_nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
