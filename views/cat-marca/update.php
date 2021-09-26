<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatMarca */

$this->title = 'Actualizar Marca: ' . $model->mar_id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mar_id, 'url' => ['view', 'id' => $model->mar_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-marca-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
