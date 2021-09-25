<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CatMunicipios */

$this->title = $model->idmunicipio;
$this->params['breadcrumbs'][] = ['label' => ' Municipios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cat-municipios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'idmunicipio' => $model->idmunicipio, 'idestado' => $model->idestado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'idmunicipio' => $model->idmunicipio, 'idestado' => $model->idestado], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro que deseas eliminar este municipio?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idmunicipio',
            'idestado',
            'municipio',
        ],
    ]) ?>

</div>
