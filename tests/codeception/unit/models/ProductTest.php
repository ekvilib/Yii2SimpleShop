<?php

namespace tests\codeception\unit\models;

use app\models\Product;
use tests\codeception\unit\fixtures\ProductFixture;
use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;

class ProductTest extends TestCase
{
	use Specify;

	public function testCreateProduct()
	{
		$product = new Product();
		$product->category_id = 1;
		$product->name = 'Product name';
		$product->description = 'Product description';
		$product->price = "100.04";
		$product->save();

		expect("Product should been in database", Product::findOne($product->id))->notNull();
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
