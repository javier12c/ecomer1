<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatMunicipios */

$this->title = 'Modificar Municipios: ' . $model->idmunicipio;
$this->params['breadcrumbs'][] = ['label' => ' Municipios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmunicipio, 'url' => ['view', 'idmunicipio' => $model->idmunicipio, 'idestado' => $model->idestado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-municipios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
