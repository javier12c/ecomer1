<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatEstados */

$this->title = 'Create Cat Estados';
$this->params['breadcrumbs'][] = ['label' => ' Estados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-estados-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
