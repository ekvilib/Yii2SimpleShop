<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BasketProduct;

/**
 * BasketProductSearch represents the model behind the search form about `app\models\BasketProduct`.
 */
class BasketProductSearch extends BasketProduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'product_id', 'count'], 'integer'],
	        [['time_create'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BasketProduct::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
	        'count' => $this->count,
	        'time_create' => $this->time_create,
        ]);

        return $dataProvider;
    }
}
