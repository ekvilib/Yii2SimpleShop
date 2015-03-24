<?php

namespace tests\codeception\unit\models;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;

class BasketProductTest extends TestCase
{
	use Specify;

	public function testGetPrice()
	{
		$basketProduct = new BasketProduct();
		$basketProduct->user_id = 1;
		$basketProduct->product_id = 1;
		$basketProduct->count = 1;

		expect("Basket product should have price", $basketProduct->price)->notNull();
	}
}
