<?php

namespace tests\codeception\unit\models;

use app\models\BasketProduct;
use tests\codeception\unit\fixtures\BasketProductFixture;
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

		expect("Basket product should been exist", $basketProduct->product)->notNull();
	}

	public function fixtures()
	{
		return [
			'user' => [
				'class' => BasketProductFixture::className(),
				'dataFile' => '@tests/codeception/unit/fixtures/data/basket-product.php',
			],
		];
	}

}
