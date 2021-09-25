<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DomicilioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Domicilios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="domicilio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Domicilio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dom_id',
            'dom_ciudad:ntext',
           //'dom_colonia:ntext',
            'dom_calle:ntext',
            'dom_numExt',
            'dom_numInt',
            'dom_telefono',
            //'dom_fkusuario',
            'dom_fkcp',
            'coloniaNombre',
            'usuarioNombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
