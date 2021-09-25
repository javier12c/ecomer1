<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatMunicipios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-municipios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idmunicipio')->textInput() ?>

    <?= $form->field($model, 'idestado')->textInput() ?>

    <?= $form->field($model, 'municipio')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
