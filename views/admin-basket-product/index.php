<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BasketProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="basket-product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать покупку для пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'layout'=>"{items}{pager}",
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',[
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->userName;
                },
            ],
            [
                'attribute' => 'product_id',
                'value' => function ($model) {
                    return $model->ololo();
                },
            ],
	        'count',
	        'time_create',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
