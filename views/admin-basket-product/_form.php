<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BasketProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="basket-product-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'user_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\User::find()->all(), 'id', 'username')); ?>

	<?= $form->field($model, 'product_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Product::find()->all(), 'id', 'name')); ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
