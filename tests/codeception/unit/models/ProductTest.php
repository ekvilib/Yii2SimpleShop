<?php

namespace tests\codeception\unit\models;

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

		expect("Product should been in database", Product::findById($product->id))->notNull();
	}
}
