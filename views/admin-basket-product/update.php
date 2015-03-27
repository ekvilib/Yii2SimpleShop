<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BasketProduct */

$this->title = 'Обновление корзины: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Корзина', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="basket-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
