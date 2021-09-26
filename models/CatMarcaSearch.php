<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatMarca;

/**
 * CatMarcaSearch represents the model behind the search form of `app\models\CatMarca`.
 */
class CatMarcaSearch extends CatMarca
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mar_id'], 'integer'],
            [['mar_nombre'], 'safe'],
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
        $query = CatMarca::find();

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
            'mar_id' => $this->mar_id,
        ]);

        $query->andFilterWhere(['like', 'mar_nombre', $this->mar_nombre]);

        return $dataProvider;
    }
}
