<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Donation */

$this->title = "Donation #".$model->DonationID;
$this->params['breadcrumbs'][] = ['label' => 'Donations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="pull-right" style="padding-bottom:20px">
        <?= Html::a('Update', ['update', 'id' => $model->DonationID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->DonationID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'PersonID',
            // [
            //     'attribute' => 'PersonID',
            //     'format' => 'raw',
            //     'value' => $model->person->FirstName,
            // ],
            'TaxDocLoc:ntext',
            'NumItems',
            'AddedOn',
            'AddedBy',
        ],
    ]) ?>

</div>
