<?php

use yii\helpers\Html;
use app\models\CatTipo;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pro_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_fecha')->textInput() ?>

    <?= $form->field($model, 'pro_descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pro_dimensiones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_estatus')->dropDownList([ 'Agotado' => 'Agotado', 'Disponible' => 'Disponible', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pro_color')->textInput(['maxlength' => true]) ?>

    <?php /*$form->field($model, 'pro_fktipo')->textInput()*/ ?>

    <?= $form->field($model, 'pro_fkmarca')->textInput() ?>

    <?= $form->field($model, 'pro_fktienda')->textInput() ?>

    <?= $form->field($model, 'pro_fktipo')->widget(Select2::classname(), [
        'data' => CatTipo::map(),
        'language' => 'es-ES',
        'options' => ['placeholder' => 'Selecciona un Tipo ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
