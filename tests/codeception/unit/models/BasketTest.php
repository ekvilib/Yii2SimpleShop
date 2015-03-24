<?php

namespace tests\codeception\unit\models;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;

class BasketTest extends TestCase
{
	use Specify;

	public function testGetTotal()
	{
		$user = User::findByUsername('user');
		$basket = new Basket($user);

		expect("Basket should have total price", $basket->total)->notNull();
	}

	public function testGetProducts()
	{
		$user = User::findByUsername('user');
		$basket = new Basket($user);

		expect("Basket should have products", $basket->products)->notNull();
	}

	public function testAddProductToBasket()
	{
		$user = User::findByUsername('user');
		$basket = new Basket($user);

		$basketProduct = new BasketProduct();
		$basketProduct->user_id = 1;
		$basketProduct->product_id = 1;
		$basketProduct->count = 1;

		expect("Basket product should been in database", $basket->addProduct($basketProduct))->true();
	}
}
