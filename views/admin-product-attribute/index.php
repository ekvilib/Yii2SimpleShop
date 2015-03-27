<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductAttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Атрибуты продуктов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-attribute-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить атрибут для продуктов', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'layout'=>"{items}{pager}",
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'product_id',
                'value' => function ($model) {
                    return $model->product->name;
                },
            ],
            [
                'attribute' => 'type_id',
                'value' => function ($model) {
                    return $model->type->name;
                },
            ],
            'value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
