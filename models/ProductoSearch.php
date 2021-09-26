<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Producto;

/**
 * ProductoSearch represents the model behind the search form of `app\models\Producto`.
 */
class ProductoSearch extends Producto
{
    public $marca;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pro_id', 'pro_fktipo', 'pro_fkmarca', 'pro_fktienda'], 'integer'],
            [['pro_nombre', 'pro_fecha', 'pro_descripcion', 'pro_dimensiones', 'pro_imagen', 'pro_estatus', 'pro_color', 'marca'], 'safe'],
            [['pro_precio'], 'number'],
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
        $query = Producto::find();

        // add conditions that should always apply here
        $query->joinWith('proFkmarca');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'pro_id',
                'pro_nombre',
                'pro_descripcion',
                'pro_dimensiones',
                'pro_imagen',
                'pro_estatus',
                'pro_color',
                'pro_fecha',
                'pro_precio',
                'marca' => [
                    'asc' => ['pro_fkmarca' => 'SORT_ASC'],
                    'desc' => ['pro_fkmarca' => 'SORT_DESC'],
                    'default' => SORT_ASC,
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'pro_id' => $this->pro_id,
            'pro_precio' => $this->pro_precio,
            'pro_fecha' => $this->pro_fecha,
            'pro_fktipo' => $this->pro_fktipo,
            'pro_fkmarca' => $this->pro_fkmarca,
            'pro_fktienda' => $this->pro_fktienda,
        ]);

        $query->andFilterWhere(['like', 'pro_nombre', $this->pro_nombre])
            ->andFilterWhere(['like', 'pro_descripcion', $this->pro_descripcion])
            ->andFilterWhere(['like', 'pro_dimensiones', $this->pro_dimensiones])
            ->andFilterWhere(['like', 'pro_imagen', $this->pro_imagen])
            ->andFilterWhere(['like', 'pro_estatus', $this->pro_estatus])
            ->andFilterWhere(['like', 'pro_color', $this->pro_color])
            ->andFilterWhere(['like', 'pro_fkmarca', $this->marca]);
            
        return $dataProvider;
    }
}
