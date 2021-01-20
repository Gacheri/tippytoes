<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Productbrand;
use frontend\models\Productcolor;
use frontend\models\Productimage;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Product */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="container">
<div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                <p><small>Shoe Description</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><small>additional details</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><small>Pricing</small></p>
            </div>
        </div>
    </div>
    <div class="product-form ">
    <?php $form = ActiveForm::begin(); ?>
        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading">
                 <h3 class="panel-title">Product description</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                <?= $form->field($model, 'productName')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="form-group">
                <?= $form->field($model, 'productDesc')->textarea(['rows' => 6]) ?>
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
            </div>
        </div>
        <div class="panel panel-primary setup-content" id="step-2">
            <div class="panel-heading">
                 <h3 class="panel-title">Additional details</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                <?= $form->field($model, 'brandId')->dropDownList(ArrayHelper::map(productbrand::find()->asArray()->all(), 'brandId', 'brandName')) ?>
                <?= Html::button('Add Brand', ['value' => Url::to(['../productbrand/_form', 'id'=>1]), 'title' => 'ADD A NEW BRAND', 'class' => 'addbrand btn btn-warning']); ?>
                </div>
                <div class="form-group">
                <?= $form->field($model, 'colorId')->dropDownList(ArrayHelper::map(productcolor::find()->asArray()->all(), 'colorId', 'colorDesc')) ?>
                <?= Html::button('Add Color', ['value' => Url::to(['../productcolor/_form', 'id'=>2]), 'title' => 'ADD A NEW COLOR', 'class' => 'addcolor btn btn-warning']); ?>
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
            </div>
        </div>
        <div class="panel panel-primary setup-content" id="step-3">
            <div class="panel-heading">
                 <h3 class="panel-title">Images and Pricing</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Image</label>
                    <?= $form->field($images, 'imagePath')->fileInput(['maxlength' => true]) ?>
                </div>
                <div class="form-group">
                <?= $form->field($model, 'uomId')->textInput() ?>
                </div>
                <div class="form-group">
                <?= $form->field($model, 'basePrice')->textInput(['maxlength' => true]) ?>
                </div>
                <?= $form->field($model, 'createdAt')->textInput() ?>
                <?= $form->field($model, 'createdBy')->textInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('Finish', ['class' => 'btn btn-success pull-right']) ?>
                    <?= Html::submitButton('Add shoe', ['class' => 'btn btn-warning pull-left']) ?>
                </div>
            </div>   
        </div>
    <?php ActiveForm::end(); ?>

</div>
</div>

<!-- add brand modal -->
<?php 
         Modal::begin([
            'header'=>'<h4>ADD A BRAND</h4>',
            'id'=>'addbrand',
            'size'=>'modal-sm-6',
         ]);

        echo "<div id='addbrandmodalContent'></div>";
        Modal::end();
?>

<!-- add color modal -->
<?php
Modal::begin([
    'header'=>'<h4>ADD A COLOR</h4>',
    'id'=>'addcolor',
    'size'=>'modal-sm-6',
 ]);

echo "<div id='addcolormodalContent'></div>";
Modal::end();
?>

