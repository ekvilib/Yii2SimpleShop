<?php

namespace tests\codeception\unit\models;

use app\models\User;
use tests\codeception\unit\fixtures\UserFixture;
use yii\codeception\TestCase;

class UserTest extends TestCase
{
	public function testCreateUser()
	{
		$user = new User();
		$user->username = 'username';
		$user->password = 'password';
		$user->save();

		expect("User should been in database", $user->id)->notNull();
	}

	public function fixtures()
	{
		return [
			'user' => [
				'class' => UserFixture::className(),
				'dataFile' => '@tests/codeception/unit/fixtures/data/user.php',
			],
		];
	}
}
