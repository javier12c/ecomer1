<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Domicilio */

$this->title = 'Modificar datos del Domicilio: ' . $model->dom_id;
$this->params['breadcrumbs'][] = ['label' => 'Domicilios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dom_id, 'url' => ['view', 'id' => $model->dom_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="domicilio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
