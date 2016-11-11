<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Allitem */


$this->title = "View Item #".$model->ItemID;
$this->params['breadcrumbs'][] = ['label' => 'Allitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="allitem-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ItemID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ItemID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ItemID',
            'DonationID',
            'Price',
            [
                'attribute' => 'BrandID',
                'format' => 'raw',
                'value' => $model->brand->BrandName,
            ],
            'IsPriceDec',
            'IsActive',
            'AddedOn',
            'AddedBy',
            //'size',
            [
                'attribute' => 'size',
                'format' => 'raw',
                'value' => $model->size->'$Size',
            ],
        ],
    ]) ?>

</div>
