<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatTipo */

$this->title = 'Crear Tipo';
$this->params['breadcrumbs'][] = ['label' => 'Cat Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-tipo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
