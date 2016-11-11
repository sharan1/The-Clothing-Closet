<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use\app\models\Size;
use\app\models\Brand;

/* @var $this yii\web\View */
/* @var $model app\models\Allitem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="allitem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DonationID')->textInput() ?>

    <?= $form->field($model, 'Price')->textInput() ?>

      <?= $form->field($model, 'BrandID')->dropdownList(Brand::find()->select(['BrandName', 'BrandID'])->indexBy('BrandID')->column(), ['prompt' => "Select Brand"]); ?>

    <?= $form->field($model, 'IsPriceDec')->textInput() ?>

    <?= $form->field($model, 'IsActive')->textInput() ?>

    <?= $form->field($model, 'AddedOn')->textInput() ?>

    <?= $form->field($model, 'AddedBy')->textInput() ?>


       <?= $form->field($model, 'size')->dropdownList(Size::find()->select(['Size', 'ID'])->indexBy('ID')->column(), ['prompt' => "Select Size"]); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
