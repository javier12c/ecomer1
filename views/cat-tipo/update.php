<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatTipo */

$this->title = 'Actualizar Tipo: ' . $model->tip_id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tip_id, 'url' => ['view', 'id' => $model->tip_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-tipo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
