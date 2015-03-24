<?php

namespace tests\codeception\unit\models;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;

class ProductAttributeTypeTest extends TestCase
{
	use Specify;

	public function testCreateType()
	{
		$type = new ProductAttributeType();
		$type->name = 'Attribute name';
		$type->save();

		expect("Product attribute should been in database", ProductAttributeType::findById($type->id))->notNull();
	}
}
