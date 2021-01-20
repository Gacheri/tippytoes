<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Productbrand */
$this->params['breadcrumbs'][] = ['label' => 'Productbrands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productbrand-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
