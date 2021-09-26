<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_marca".
 *
 * @property int $mar_id Id
 * @property string $mar_nombre Nombre
 *
 * @property Producto[] $productos
 */
class CatMarca extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_marca';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mar_nombre'], 'required'],
            [['mar_nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mar_id' => 'Id',
            'mar_nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['pro_fkmarca' => 'mar_id']);
    }
}
