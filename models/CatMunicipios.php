<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_municipios".
 *
 * @property int $idmunicipio Id
 * @property int $idestado Estado
 * @property string $municipio Municipio
 *
 * @property CatCp[] $catCps
 * @property CatEstados $idestado0
 */
class CatMunicipios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_municipios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idmunicipio', 'idestado', 'municipio'], 'required'],
            [['idmunicipio', 'idestado'], 'integer'],
            [['municipio'], 'string', 'max' => 49],
            [['idmunicipio', 'idestado'], 'unique', 'targetAttribute' => ['idmunicipio', 'idestado']],
            [['idestado'], 'exist', 'skipOnError' => true, 'targetClass' => CatEstados::className(), 'targetAttribute' => ['idestado' => 'idestado']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idmunicipio' => 'Id',
            'idestado' => 'Estado',
            'municipio' => 'Municipio',
        ];
    }

    /**
     * Gets query for [[CatCps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatCps()
    {
        return $this->hasMany(CatCp::className(), ['idmunicipio' => 'idmunicipio']);
    }

    /**
     * Gets query for [[Idestado0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdestado0()
    {
        return $this->hasOne(CatEstados::className(), ['idestado' => 'idestado']);
    }
}
