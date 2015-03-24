<?php

namespace tests\codeception\unit\models;

use app\models\User;
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
}
