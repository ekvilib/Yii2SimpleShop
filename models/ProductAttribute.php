<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_attribute".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $type_id
 * @property string $value
 */
class ProductAttribute extends \yii\db\ActiveRecord
{
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_attribute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'type_id', 'value'], 'required'],
            [['product_id', 'type_id'], 'integer'],
            [['value'], 'string', 'max' => 254]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Наименование продукта',
            'type_id' => 'Тип',
            'value' => 'Значение',
        ];
    }

    public function getType()
    {
        return ProductAttributeType::findOne($this->type_id);
    }

    public function getProduct()
    {
        return Product::findOne($this->product_id);
    }

    public function getName()
    {
        return $this->type->name;
    }
}
