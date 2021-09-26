<?php

namespace app\models;


use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cat_tipo".
 *
 * @property int $tip_id Id
 * @property string $tip_nombre Nombre
 *
 * @property Producto[] $productos
 */
class CatTipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_tipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip_nombre'], 'required'],
            [['tip_nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tip_id'      => 'Id',
            'tip_nombre'  => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['pro_fktipo' => 'tip_id']);
    }

    public static function map()
    {
       return ArrayHelper::map(CatTipo::find()->all(), 'tip_id', 'tip_nombre');
    }
}
