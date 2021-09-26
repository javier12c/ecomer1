<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatTipo;

/**
 * CatTipoSearch represents the model behind the search form of `app\models\CatTipo`.
 */
class CatTipoSearch extends CatTipo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip_id'], 'integer'],
            [['tip_nombre'], 'safe'],
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
        $query = CatTipo::find();

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
            'tip_id' => $this->tip_id,
        ]);

        $query->andFilterWhere(['like', 'tip_nombre', $this->tip_nombre]);

        return $dataProvider;
    }
}
