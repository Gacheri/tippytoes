<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Productcolor */

$this->title = 'Update Productcolor: ' . $model->colorId;
$this->params['breadcrumbs'][] = ['label' => 'Productcolors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->colorId, 'url' => ['view', 'id' => $model->colorId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productcolor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
