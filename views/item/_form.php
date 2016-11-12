<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use\app\models\Size;
use\app\models\Brand;
use\app\models\Person;
use\app\models\Donation;

$data = Donation::find()->all();

$array_data = [];

foreach ($data as $value) 
{
    $array_data[$value->DonationID] = $value->person->fullName." - ".$value->AddedOn;
}
/* @var $this yii\web\View */
/* @var $model app\models\Allitem */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="allitem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DonationID')->dropdownList($array_data, ['prompt' => "Select Donation"]); ?>

    <?= $form->field($model, 'Price')->textInput() ?>

      <?= $form->field($model, 'BrandID')->dropdownList(Brand::find()->select(['BrandName', 'BrandID'])->indexBy('BrandID')->column(), ['prompt' => "Select Brand"]); ?>

    <?= $form->field($model, 'IsPriceDec')->dropdownList([1 => "Yes", 0 => "No"], ['prompt' => "Select"]);?>

    <?= $form->field($model, 'SizeID')->dropdownList(Size::find()->select(['Size', 'ID'])->indexBy('ID')->column(), ['prompt' => "Select Size"]); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
