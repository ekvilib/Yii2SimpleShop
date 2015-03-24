<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse',
                ],
            ]);

	        $items = [
		        ['label' => 'Home', 'url' => ['/site/index']],
		        ['label' => 'About', 'url' => ['/site/about']],
		        ['label' => 'Contact', 'url' => ['/site/contact']],
		        Yii::$app->user->isGuest ?
			        ['label' => 'Login', 'url' => ['/site/login']] :
			        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
				        'url' => ['/site/logout'],
				        'linkOptions' => ['data-method' => 'post']],
	        ];

	        if(!Yii::$app->user->isGuest && Yii::$app->user->identity->is_admin)
	        {
		        $items[] = ['label' => 'Edit users', 'url' => ['/admin-user']];
		        $items[] = ['label' => 'Edit baskets', 'url' => ['/admin-basket-product']];
		        $items[] = ['label' => 'Edit categories', 'url' => ['/admin-category']];
		        $items[] = ['label' => 'Edit product', 'url' => ['/admin-product']];
		        $items[] = ['label' => 'Edit product attributes', 'url' => ['/admin-product-attribute']];
		        $items[] = ['label' => 'Edit product attributes types', 'url' => ['/admin-product-attribute-type']];
	        }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => $items,
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
