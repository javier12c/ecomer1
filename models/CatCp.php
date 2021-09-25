<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cat_cp".
 *
 * @property int $idcp Id
 * @property int $idmunicipio Municipio
 * @property int $idestado Estado
 * @property int $cp Código Postal
 * @property string $colonia Colonia
 *
 * @property Domicilio[] $domicilios
 * @property CatEstados $idestado0
 * @property CatMunicipios $idmunicipio0
 */
class CatCp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_cp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idcp', 'idmunicipio', 'idestado', 'cp', 'colonia'], 'required'],
            [['idcp', 'idmunicipio', 'idestado', 'cp'], 'integer'],
            [['colonia'], 'string', 'max' => 60],
            [['idcp'], 'unique'],
            [['idestado'], 'exist', 'skipOnError' => true, 'targetClass' => CatEstados::className(), 'targetAttribute' => ['idestado' => 'idestado']],
            [['idmunicipio'], 'exist', 'skipOnError' => true, 'targetClass' => CatMunicipios::className(), 'targetAttribute' => ['idmunicipio' => 'idmunicipio']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcp' => 'Id',
            'idmunicipio' => 'Municipio',
            'idestado' => 'Estado',
            'cp' => 'Código Postal',
            'colonia' => 'Colonia',
        ];
    }

    /**
     * Gets query for [[Domicilios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDomicilios()
    {
        return $this->hasMany(Domicilio::className(), ['dom_fkcp' => 'idcp']);
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

    /**
     * Gets query for [[Idmunicipio0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdmunicipio0()
    {
        return $this->hasOne(CatMunicipios::className(), ['idmunicipio' => 'idmunicipio']);
    }
   // public static function map()
   // {
    //  return ArrayHelper::map (  CatCp::find()->all(),'idcp','colonia');

    //}
}
