<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DomicilioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="domicilio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'dom_id') ?>

    <?= $form->field($model, 'dom_ciudad') ?>

    <?= $form->field($model, 'dom_colonia') ?>

    <?= $form->field($model, 'dom_calle') ?>

    <?= $form->field($model, 'dom_numExt') ?>

    <?php // echo $form->field($model, 'dom_numInt') ?>

    <?php // echo $form->field($model, 'dom_telefono') ?>

    <?php // echo $form->field($model, 'dom_fkusuario') ?>

    <?php // echo $form->field($model, 'dom_fkcp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
