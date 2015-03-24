<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class CategoryController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex($id)
    {
	    $products = Product::find()
		    ->where(['category_id' => $id])
		    ->all();

        return $this->render('index', [
	        'products' => $products
        ]);
    }
}
