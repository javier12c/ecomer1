<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "producto".
 *
 * @property int $pro_id Id
 * @property string $pro_nombre Nombre
 * @property float $pro_precio Precio
 * @property string $pro_fecha Fecha
 * @property string $pro_descripcion Descripción
 * @property string $pro_dimensiones Dimensiones
 * @property string $pro_imagen Imagen
 * @property string $pro_estatus Estatus
 * @property string $pro_color Color
 * @property int $pro_fktipo Tipo de producto
 * @property int $pro_fkmarca Características
 * @property int $pro_fktienda Tienda
 *
 * @property CarritoDetalle[] $carritoDetalles
 * @property CatFavorito[] $catFavoritos
 * @property Descuento[] $descuentos
 * @property CatMarca $proFkmarca
 * @property Tienda $proFktienda
 * @property CatTipo $proFktipo
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pro_nombre', 'pro_precio', 'pro_fecha', 'pro_descripcion', 'pro_estatus', 'pro_color', 'pro_fktipo', 'pro_fkmarca', 'pro_fktienda'], 'required'],
            [['pro_precio'], 'number'],
            [['pro_fecha'], 'safe'],
            [['pro_descripcion', 'pro_estatus'], 'string'],
            [['pro_fktipo', 'pro_fkmarca', 'pro_fktienda'], 'integer'],
            [['pro_nombre'], 'string', 'max' => 100],
            [['pro_dimensiones'], 'string', 'max' => 50],
            [['pro_imagen'], 'string', 'max' => 150],
            [['pro_color'], 'string', 'max' => 10],
            [['pro_fktienda'], 'exist', 'skipOnError' => true, 'targetClass' => Tienda::className(), 'targetAttribute' => ['pro_fktienda' => 'tie_id']],
            [['pro_fktipo'], 'exist', 'skipOnError' => true, 'targetClass' => CatTipo::className(), 'targetAttribute' => ['pro_fktipo' => 'tip_id']],
            [['pro_fkmarca'], 'exist', 'skipOnError' => true, 'targetClass' => CatMarca::className(), 'targetAttribute' => ['pro_fkmarca' => 'mar_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pro_id' => 'Id',
            'pro_nombre' => 'Nombre',
            'pro_precio' => 'Precio',
            'pro_fecha' => 'Fecha',
            'pro_descripcion' => 'Descripción',
            'pro_dimensiones' => 'Dimensiones',
            'pro_imagen' => 'Imagen',
            'pro_estatus' => 'Estatus',
            'pro_color' => 'Color',
            'pro_fktipo' => 'Tipo de producto',
            'pro_fkmarca' => 'Características',
            'pro_fktienda' => 'Tienda',
        ];
    }

    /**
     * Gets query for [[CarritoDetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarritoDetalles()
    {
        return $this->hasMany(CarritoDetalle::className(), ['cardet_fkproducto' => 'pro_id']);
    }

    /**
     * Gets query for [[CatFavoritos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatFavoritos()
    {
        return $this->hasMany(CatFavorito::className(), ['fav_fkproducto' => 'pro_id']);
    }

    /**
     * Gets query for [[Descuentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDescuentos()
    {
        return $this->hasMany(Descuento::className(), ['des_fkproducto' => 'pro_id']);
    }

    /**
     * Gets query for [[ProFkmarca]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProFkmarca()
    {
        return $this->hasOne(CatMarca::className(), ['mar_id' => 'pro_fkmarca']);
    }

    /**
     * Gets query for [[ProFktienda]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProFktienda()
    {
        return $this->hasOne(Tienda::className(), ['tie_id' => 'pro_fktienda']);
    }

    /**
     * Gets query for [[ProFktipo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProFktipo()
    {
        return $this->hasOne(CatTipo::className(), ['tip_id' => 'pro_fktipo']);
    }

    public static function map(){
        return ArrayHelper::map(Producto::find()->all(),'pro_id','pro_nombre');
    }

    public function getMarca()
    {
        return $this->proFkmarca->mar_nombre;
    }
}
