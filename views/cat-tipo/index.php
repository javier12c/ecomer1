<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatTipoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-tipo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Tipo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tip_id',
            'tip_nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
