<?php

namespace tests\codeception\unit\models;

use app\models\ProductAttributeType;
use tests\codeception\unit\fixtures\ProductAttributeTypeFixture;
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

		expect("Product attribute should been in database", ProductAttributeType::findOne($type->id))->notNull();
	}

	public function fixtures()
	{
		return [
			'user' => [
				'class' => ProductAttributeTypeFixture::className(),
				'dataFile' => '@tests/codeception/unit/fixtures/data/product-attribute-type.php',
			],
		];
	}
}
