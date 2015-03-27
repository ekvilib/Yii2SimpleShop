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
<body background="../images/46.png">>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Корзинка',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'myimage',
                ],
            ]);

	        $items = [
		        ['label' => 'Главная', 'url' => ['/site/index']],
		        ['label' => 'Контакты', 'url' => ['/site/about']],
		        ['label' => 'Обратная связь', 'url' => ['/site/contact']],
		        Yii::$app->user->isGuest ?
			        ['label' => 'Войти', 'url' => ['/site/login']] :
			        ['label' => 'Выход (' . Yii::$app->user->identity->username . ')',
				        'url' => ['/site/logout'],
				        'linkOptions' => ['data-method' => 'post']],
	        ];

            if(!Yii::$app->user->isGuest && Yii::$app->user->identity->is_admin)
            {
                $items[] = ['label' => 'Редактироваль пользователей', 'url' => ['/admin-user']];
                $items[] = ['label' => 'Редактировать карзины', 'url' => ['/admin-basket-product']];
                $items[] = ['label' => 'Редактировать категории', 'url' => ['/admin-category']];
                $items[] = ['label' => 'Редактировать продукты', 'url' => ['/admin-product']];
                $items[] = ['label' => 'Редактировать атрибуты продуктов', 'url' => ['/admin-product-attribute']];
                $items[] = ['label' => 'Редактировать типы атрибутов', 'url' => ['/admin-product-attribute-type']];
            }

            if(!Yii::$app->user->isGuest)
            {
                $items[] = ['label' => 'Корзина', 'url' => ['/basket']];
            }
        else
        {
            $items[] = ['label' => 'Регистрация', 'url' => ['/site/register']];
        }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => $items,
            ]);
            NavBar::end();
        ?>

        <div class="container">

            <?= Breadcrumbs::widget([
                'homeLink' => [
                    'url' => '/',
                    'label' => 'Главная страница',
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Корзинка <?= date('Y') ?></p>
            <p class="pull-right"><?= 'Made in china' ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
