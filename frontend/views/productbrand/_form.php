<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Productbrand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productbrand-form" >

    <?php $form = ActiveForm::begin([
        'options'=>[
            'id'=>'addbrand',
            'class'=>''
        ]
    ]); ?>

    <?= $form->field($model, 'brandName')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
