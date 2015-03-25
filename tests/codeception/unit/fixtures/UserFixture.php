<?php

namespace tests\codeception\unit\fixtures;

use Yii;
use yii\test\ActiveFixture;

class UserFixture extends ActiveFixture
{
	public $modelClass = 'app\models\User';

	public function unload()
	{
		$this->resetTable();
	}
}
