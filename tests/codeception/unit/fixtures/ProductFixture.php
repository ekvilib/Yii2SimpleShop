<?php

namespace tests\codeception\unit\fixtures;

use Yii;
use yii\test\ActiveFixture;

class ProductFixture extends ActiveFixture
{
	public $modelClass = 'app\models\Product';

	public function unload()
	{
		$this->resetTable();
	}
}
