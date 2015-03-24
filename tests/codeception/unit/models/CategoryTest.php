<?php

namespace tests\codeception\unit\models;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;

class CategoryTest extends TestCase
{
	use Specify;

	public function testCreateCategory()
	{
		$category = new Category();
		$category->name = 'Category name';
		$category->parent_id = null;
		$category->save();

		expect("Category should been in database", Category::findById($category->id))->notNull();


		$subcategory = new Category();
		$subcategory->name = 'Subcategory name';
		$subcategory->parent_id = $category->id;
		$subcategory->save();

		expect("Subcategory should been in database", Category::findById($subcategory->id))->notNull();
	}

	public function testGetSubcategories()
	{
		$category = Category::findOne(1);

		expect("Subcategory should been in database", $category->subcategories)->notNull();
	}
}
