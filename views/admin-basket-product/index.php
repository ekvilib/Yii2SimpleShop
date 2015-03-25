<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BasketProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Basket Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="basket-product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Basket Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'product_id',
	        'count',
	        'time_create',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
