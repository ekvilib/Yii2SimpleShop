<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductAttribute */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-attribute-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'product_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Product::find()->all(), 'id', 'name')); ?>

	<?= $form->field($model, 'type_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\ProductAttributeType::find()->all(), 'id', 'name')); ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
