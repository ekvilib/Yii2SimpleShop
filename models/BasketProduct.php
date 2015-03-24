<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "basket_product".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $count
 */
class BasketProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'basket_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id'], 'required'],
            [['user_id', 'product_id', 'count'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'product_id' => 'Product ID',
            'count' => 'Count',
        ];
    }
}
