<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Shop!</h1>

        <p class="lead">welcome!</p>
    </div>

	<?php foreach($categories as $category): ?>
		<?php if($category->parent_id == null): ?>
			<div class="row" style="padding-top: 30px;">
				<div class="col-md-12">
					<a href="<?php echo Yii::$app->urlManager->createUrl(['category', 'id' => $category->id]); ?>"><h4><?php echo $category->name; ?></h4></a>

					<?php foreach($categories as $subcategory): ?>
						<?php if($subcategory->parent_id == $category->id): ?>
							<div class="">
								<a href="<?php echo Yii::$app->urlManager->createUrl(['category', 'id' => $category->id]); ?>"><?php echo $category->name; ?></a>
							</div>
						<?php endif;?>
					<?php endforeach; ?>

				</div>
			</div>
		<?php endif;?>
	<?php endforeach; ?>

</div>
