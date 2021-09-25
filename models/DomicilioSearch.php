<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Domicilio;

/**
 * DomicilioSearch represents the model behind the search form of `app\models\Domicilio`.
 */
class DomicilioSearch extends Domicilio
{

    public $coloniaNombre;
    public $usuarioNombre;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dom_id', 'dom_fkusuario', 'dom_fkcp'], 'integer'],
            [['dom_ciudad', 'dom_colonia', 'dom_calle', 'dom_numExt', 'dom_numInt', 'dom_telefono', 'coloniaNombre','usuarioNombre'], 'safe'],
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
        $query = Domicilio::find();

        // add conditions that should always apply here
        $query->joinWith('domFkcp');
         $query->joinWith('domFkusuario');
        

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'dom_id',
                'dom_cuidad',
                'dom_calle',
                'dom_numExt',
                'dom_numInt',
                'dom_telefono',
                'coloniaNombre' =>[
                    'asc' => ['colonia' => SORT_ASC],
                     'desc' => ['colonia' => SORT_DESC],
                     'default' => SORT_ASC,
                ],
                'usuarioNombre' =>[
                    'asc' => ['usu_nombre' => SORT_ASC],
                     'desc' => ['usu_nombre' => SORT_DESC],
                     'default' => SORT_ASC,]

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
            'dom_id' => $this->dom_id,
            'dom_fkusuario' => $this->dom_fkusuario,
            'dom_fkcp' => $this->dom_fkcp,
        ]);

        $query->andFilterWhere(['like', 'dom_ciudad', $this->dom_ciudad])
            ->andFilterWhere(['like', 'dom_colonia', $this->dom_colonia])
             ->andFilterWhere(['like', 'colonia', $this->coloniaNombre])
            ->andFilterWhere(['like', 'dom_calle', $this->dom_calle])
            ->andFilterWhere(['like', 'dom_numExt', $this->dom_numExt])
            ->andFilterWhere(['like', 'dom_numInt', $this->dom_numInt])
             ->andFilterWhere(['like', 'usu_nombre', $this->usuarioNombre])
            ->andFilterWhere(['like', 'dom_telefono', $this->dom_telefono]);
           
        return $dataProvider;
    }
}
