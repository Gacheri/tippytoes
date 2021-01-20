<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Productbrand */

$this->title = 'Update Productbrand: ' . $model->brandId;
$this->params['breadcrumbs'][] = ['label' => 'Productbrands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->brandId, 'url' => ['view', 'id' => $model->brandId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productbrand-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
