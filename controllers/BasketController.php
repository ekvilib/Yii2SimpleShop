<?php

namespace app\controllers;

use app\models\Basket;
use app\models\BasketProduct;
use app\models\ContactForm;
use app\models\Product;
use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class BasketController extends Controller
{
	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

	public function beforeAction($action)
	{
		parent::beforeAction($action);

		if (Yii::$app->user->isGuest) {
			throw new ForbiddenHttpException('Guests is not allowed to basket');
		}

		return true;
	}

	public function actionIndex()
	{
		$model = new ContactForm([
            'subject' => 'Заказ с сайта'
        ]);
		if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
			Yii::$app->session->setFlash('contactFormSubmitted');
            BasketProduct::deleteAll([
                'user_id' => Yii::$app->user->id
            ]);

			return $this->refresh();
		}

		$basketProducts = BasketProduct::find()
			->where(['user_id' => Yii::$app->user->id])
			->all();

		return $this->render('index', [
			'basketProducts' => $basketProducts,
			'model' => $model
		]);
	}

    public function actionPut($id)
    {
        $product = Product::findOne($id);
        if (!$product) {
            throw new NotFoundHttpException('product is invalid');
        }

        $basketProduct = new Basket(Yii::$app->user->identity);
        $basketProduct->addProduct($product);

        return Yii::$app->response->redirect(Yii::$app->urlManager->createUrl('basket'));
    }

    public function actionAdd($id)
    {
        $product = BasketProduct::findOne($id);
        if (!$product) {
            throw new NotFoundHttpException('product is invalid');
        }

        $product->count++;
        $product->save();

        return Yii::$app->response->redirect(Yii::$app->urlManager->createUrl('basket'));
    }

    public function actionRemove($id)
    {
        $product = BasketProduct::findOne($id);
        if (!$product) {
            throw new NotFoundHttpException('product is invalid');
        }

        $product->count--;

        if($product->count > 0)
        {
            $product->save();
        }
        else
        {
            $product->delete();
        }

        return Yii::$app->response->redirect(Yii::$app->urlManager->createUrl('basket'));
    }
}
