<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Itemsold */

$this->title = $model->ItemID;
$this->params['breadcrumbs'][] = ['label' => 'Itemsolds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="itemsold-view">

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
            'CustomerID',
            'AddedOn',
            [
                'attribute' => 'AddedBy',
                'format' => 'raw',
                'value' => $model->addedBy->fullName,
            ],

        ],
    ]) ?>

</div>
