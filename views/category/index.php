<?php
/* @var $this yii\web\View */
$this->title = 'Category';
?>
<div class="category-index">

	<h1>Products</h1>

	<?php foreach($products as $product): ?>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success">
					<h2><?php echo $product->name; ?></h2>
					<div class="badge badge-inverse">Стоимость: <?php echo $product->price; ?></div>
                    <?php echo $product->description; ?>

                    <div>
                        <?php foreach($product->attributes as $attribute): ?>
                            <?php echo $attribute->name; ?>: <?php echo $attribute->value; ?>
                        <?php endforeach; ?>
                    </div>

					<a class='btn btn-success' href="<?php echo Yii::$app->urlManager->createUrl(['basket/put', 'id' => $product->id]) ; ?>">В корзину</a>
				</div>
			</div>
		</div>
	<?php endforeach; ?>

</div>
