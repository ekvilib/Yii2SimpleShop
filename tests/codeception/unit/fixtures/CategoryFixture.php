<?php

namespace tests\codeception\unit\fixtures;

use Yii;
use yii\test\ActiveFixture;

class CategoryFixture extends ActiveFixture
{
	public $modelClass = 'app\models\Category';

	public function unload()
	{
		$this->resetTable();
	}
}
