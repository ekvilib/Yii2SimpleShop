<?php

namespace tests\codeception\unit\models;

use app\models\Category;
use Codeception\Specify;
use tests\codeception\unit\fixtures\CategoryFixture;
use Yii;
use yii\codeception\TestCase;

class CategoryTest extends TestCase
{
	use Specify;

	public function testCreateCategory()
	{
		$category = new Category();
		$category->name = 'Category name';
		$category->parent_id = null;
		$category->save();

		expect("Category should been in database", Category::findOne($category->id))->notNull();


		$subcategory = new Category();
		$subcategory->name = 'Subcategory name';
		$subcategory->parent_id = $category->id;
		$subcategory->save();

		expect("Subcategory should been in database", Category::findOne($subcategory->id))->notNull();
	}

	public function testGetSubcategories()
	{
		$category = Category::findOne(1);

		expect("Subcategory should been in database", $category->subcategories)->notNull();
	}

	public function fixtures()
	{
		return [
			'user' => [
				'class' => CategoryFixture::className(),
				'dataFile' => '@tests/codeception/unit/fixtures/data/category.php',
			],
		];
	}
}
