<?php

namespace tests\codeception\unit\fixtures;

use Yii;
use yii\test\ActiveFixture;

class BasketProductFixture extends ActiveFixture
{
	public $modelClass = 'app\models\BasketProduct';

	public function unload()
	{
		$this->resetTable();
	}
}
