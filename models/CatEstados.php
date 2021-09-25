<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_estados".
 *
 * @property int $idestado Id
 * @property string $estado Estado
 *
 * @property CatCp[] $catCps
 * @property CatMunicipios[] $catMunicipios
 */
class CatEstados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_estados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idestado', 'estado'], 'required'],
            [['idestado'], 'integer'],
            [['estado'], 'string', 'max' => 31],
            [['idestado'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idestado' => 'Id',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[CatCps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatCps()
    {
        return $this->hasMany(CatCp::className(), ['idestado' => 'idestado']);
    }

    /**
     * Gets query for [[CatMunicipios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatMunicipios()
    {
        return $this->hasMany(CatMunicipios::className(), ['idestado' => 'idestado']);
    }
}
