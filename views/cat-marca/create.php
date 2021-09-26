<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatMarca */

$this->title = 'Crear Marca';
$this->params['breadcrumbs'][] = ['label' => 'Cat Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-marca-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
