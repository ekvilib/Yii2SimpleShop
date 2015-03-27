<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительская категория',
            'name' => 'Наименование продукта',
        ];
    }

	public function getSubcategories()
	{
		return static::find()
			->where(['parent_id' => $this->id])
			->all();
	}

    public function getCategories()
    {
        return static::find()
            ->where(['parent_id' => $this->id])
            ->one();
    }

    public function getParent()
    {
        return self::find()
            ->where (['id'=> $this->parent_id])
            -> one()->name;
    }
}
