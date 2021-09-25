<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatMunicipios */

$this->title = 'Agregar un Municipio';
$this->params['breadcrumbs'][] = ['label' => 'Municipios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-municipios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
