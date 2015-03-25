<?php

namespace tests\codeception\unit\fixtures;

use Yii;
use yii\test\ActiveFixture;

class ProductAttributeFixture extends ActiveFixture
{
	public $modelClass = 'app\models\ProductAttribute';
	public $depends = ['tests\codeception\unit\fixtures\ProductFixture'];

	public function unload()
	{
		$this->resetTable();
	}
}
