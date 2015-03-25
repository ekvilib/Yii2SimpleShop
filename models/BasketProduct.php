<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\BaseActiveRecord;
use yii\db\Expression;

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
	public function behaviors()
	{
		return [
			[
				'class' => TimestampBehavior::className(),
				'attributes' => [
					BaseActiveRecord::EVENT_BEFORE_INSERT => 'time_create',
				],
				'value' => new Expression('NOW()')
			],
		];
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id'], 'required'],
            [['user_id', 'product_id', 'count'], 'integer'],
	        [['time_create'], 'safe'],
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
	        'time_create' => 'Time create',
        ];
    }

	public function getProduct()
	{
		return Product::findOne($this->product_id);
	}
}
