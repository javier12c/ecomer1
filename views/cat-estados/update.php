<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatEstados */

$this->title = 'Modificar Estados: ' . $model->idestado;
$this->params['breadcrumbs'][] = ['label' => ' Estados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idestado, 'url' => ['view', 'id' => $model->idestado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-estados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
