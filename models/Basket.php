<?php

namespace app\models;

use Yii;
use yii\base\Model;


class Basket extends Model
{
	private $_user;

	function __construct(User $user, $config = [])
	{
		$this->_user = $user;

		parent::__construct($config);
	}

	public function getTotal()
	{
		$price = 0;
		foreach ($this->products as $product) {
			$price = $price + $product->price;
		}

		return $price;
	}

	public function getProducts()
	{
		return BasketProduct::find()
			->where(['user_id' => $this->_user->id])
			->all();
	}

	public function addProduct(Product $product)
	{
		$existedBasketProduct = BasketProduct::find()->where(['user_id' => $this->_user->id, 'product_id' => $product->id])->one();

		if ($existedBasketProduct) {
			$existedBasketProduct->count = $existedBasketProduct->count + 1;

			return $existedBasketProduct->save();
		}

		$newBasketProduct = new BasketProduct();
		$newBasketProduct->product_id = $product->id;
		$newBasketProduct->user_id = $this->_user->id;

		return $newBasketProduct->save();
	}
}
