<?php

namespace tests\codeception\unit\models;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;

class ProductAttributeTest extends TestCase
{
	use Specify;

	public function testCreateAttribute()
	{
		$attribute = new ProductAttribute(1, 1);
		$attribute->value = "attribute value";
		$attribute->save();

		expect("Product attribute should been in database", ProductAttribute::findById($attribute->id))->notNull();
	}

	public function testGetType()
	{
		$attribute = new ProductAttribute(1, 1);

		expect("Product attribute should been in database", $attribute->type->name)->notNull();
	}
}
