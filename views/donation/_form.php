<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Donation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TaxDocLoc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'PersonID')->textInput() ?>

    <?= $form->field($model, 'NumItems')->textInput() ?>

    <?= $form->field($model, 'AddedOn')->textInput() ?>

    <?= $form->field($model, 'AddedBy')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
