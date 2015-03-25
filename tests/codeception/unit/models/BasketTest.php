<?php

namespace tests\codeception\unit\models;

use app\models\Basket;
use app\models\BasketProduct;
use app\models\Product;
use app\models\User;
use tests\codeception\unit\fixtures\ProductFixture;
use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;

class BasketTest extends TestCase
{
	use Specify;

	public function testGetTotal()
	{
		$user = User::findByUsername('demo');
		$basket = new Basket($user);

		expect("Basket should have total price", $basket->total)->notNull();
	}

	public function testGetProducts()
	{
		$user = User::findByUsername('demo');
		$basket = new Basket($user);

		expect("Basket should have products", $basket->products)->notNull();
	}

	public function testAddProductToBasket()
	{
		$user = User::findByUsername('demo');
		$basket = new Basket($user);

		$product = Product::findOne(1);

		expect("Basket product should been in database", $basket->addProduct($product))->true();
	}

	public function fixtures()
	{
		return [
			'user' => [
				'class' => ProductFixture::className(),
				'dataFile' => '@tests/codeception/unit/fixtures/data/product.php',
			],
		];
	}
}
