<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProductcolorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productcolors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productcolor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Productcolor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'colorId',
            'colorDesc',
            'colorCode',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
