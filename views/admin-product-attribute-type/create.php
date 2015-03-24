<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductAttributeType */

$this->title = 'Create Product Attribute Type';
$this->params['breadcrumbs'][] = ['label' => 'Product Attribute Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-attribute-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
