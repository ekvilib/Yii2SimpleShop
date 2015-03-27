<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
	    <div style="height: 200px;">
		    <h1>Интернет-магазин "КОРЗИНКА"!</h1>
	    </div>

        <p class="lead">Добро пожаловать в интернет-магазин!</p>
    </div>

	<?php foreach($categories as $category): ?>
		<?php if($category->parent_id == null): ?>
			<div class="row" style="padding-top: 30px;">
				<div class="col-md-12">
					<a href="<?php echo Yii::$app->urlManager->createUrl(['category', 'id' => $category->id]); ?>"><h4><?php echo $category->name; ?></h4></a>

					<?php foreach($category->subcategories as $subcategory): ?>
						<div class="">
							<a href="<?php echo Yii::$app->urlManager->createUrl(['category', 'id' => $subcategory->id]); ?>"><?php echo $subcategory->name; ?></a>
						</div>
					<?php endforeach; ?>

				</div>
			</div>
		<?php endif;?>
	<?php endforeach; ?>

</div>
