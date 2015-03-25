<?php

namespace tests\codeception\unit\models;

use app\models\ProductAttribute;
use tests\codeception\unit\fixtures\ProductAttributeFixture;
use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;

class ProductAttributeTest extends TestCase
{
	use Specify;

	public function testCreateAttribute()
	{
		$attribute = new ProductAttribute([
			'product_id' => 1,
			'type_id' => 1,
		]);
		$attribute->value = "attribute value";
		$attribute->save();

		expect("Product attribute should been in database", ProductAttribute::findOne($attribute->id))->notNull();
	}

	public function testGetType()
	{
		$attribute = new ProductAttribute([
			'product_id' => 1,
			'type_id' => 1,
		]);

		expect("Product attribute should been in database", $attribute->type->name)->notNull();
	}

	public function fixtures()
	{
		return [
			'user' => [
				'class' => ProductAttributeFixture::className(),
				'dataFile' => '@tests/codeception/unit/fixtures/data/product-attribute.php',
			],
		];
	}
}
