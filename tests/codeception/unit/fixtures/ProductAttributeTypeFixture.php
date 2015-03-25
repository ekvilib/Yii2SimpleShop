<?php

namespace tests\codeception\unit\fixtures;

use Yii;
use yii\test\ActiveFixture;

class ProductAttributeTypeFixture extends ActiveFixture
{
	public $modelClass = 'app\models\ProductAttributeType';
	public $depends = ['tests\codeception\unit\fixtures\ProductAttributeFixture'];

	public function unload()
	{
		$this->resetTable();
	}
}
