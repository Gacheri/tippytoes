<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Productcolor;

/**
 * ProductcolorSearch represents the model behind the search form of `frontend\models\Productcolor`.
 */
class ProductcolorSearch extends Productcolor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['colorId'], 'integer'],
            [['colorDesc', 'colorCode'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Productcolor::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'colorId' => $this->colorId,
        ]);

        $query->andFilterWhere(['like', 'colorDesc', $this->colorDesc])
            ->andFilterWhere(['like', 'colorCode', $this->colorCode]);

        return $dataProvider;
    }
}
