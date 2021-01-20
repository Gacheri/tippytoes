<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "product".
 *
 * @property int $productId
 * @property string $productName
 * @property string $productDesc
 * @property float $basePrice
 * @property int $uomId
 * @property int $brandId
 * @property int $colorId
 * @property string $createdAt
 * @property int $createdBy
 * @property Cartitems[] $cartitems
 * @property Orderitem[] $orderitems
 * @property Productbrand $brand
 * @property Productcolor $color
 * @property Productuom $uom
 * @property User $createdBy0
 * @property Productcategory[] $productcategories
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    // public function behaviors(){
    //     return [
    //         TimestampBehavior::class,[
    //             'class'=>BlameableBehavior::class,
    //             'createdByAttribute'=>false,
    //         ]
    //         ];
    // }
    // public function behaviors()
    // {
    //     return [
    //         BlameableBehavior::className(),
    //         TimestampBehavior::className(),
    //         'createdByAttribute'=>false,

    //     ];
    // }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productName', 'productDesc', 'basePrice', 'uomId', 'brandId', 'colorId', 'createdBy'], 'required'],
            [['productDesc'], 'string'],
            [['basePrice'], 'number'],
            [['uomId', 'brandId', 'colorId', 'createdBy'], 'integer'],
            [['createdAt'], 'safe'],
            [['productName'], 'string', 'max' => 255],
            [['brandId'], 'exist', 'skipOnError' => true, 'targetClass' => Productbrand::className(), 'targetAttribute' => ['brandId' => 'brandId']],
            [['colorId'], 'exist', 'skipOnError' => true, 'targetClass' => Productcolor::className(), 'targetAttribute' => ['colorId' => 'colorId']],
            [['uomId'], 'exist', 'skipOnError' => true, 'targetClass' => Productuom::className(), 'targetAttribute' => ['uomId' => 'uomId']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'productId' => 'Product ID',
            'productName' => 'Product Name',
            'productDesc' => 'Product Description',
            'basePrice' => 'Base Price',
            'uomId' => 'Shoe size',
            'brandId' => 'Brand',
            'colorId' => 'Color',
            'createdAt' => 'Created At',
            'createdBy' => 'Created By',
        ];
    }

    /**
     * Gets query for [[Cartitems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCartitems()
    {
        return $this->hasMany(Cartitems::className(), ['productId' => 'productId']);
    }

    /**
     * Gets query for [[Orderitems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderitems()
    {
        return $this->hasMany(Orderitem::className(), ['productId' => 'productId']);
    }

    /**
     * Gets query for [[Brand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Productbrand::className(), ['brandId' => 'brandId']);
    }

    /**
     * Gets query for [[Color]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(Productcolor::className(), ['colorId' => 'colorId']);
    }

    /**
     * Gets query for [[Uom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUom()
    {
        return $this->hasOne(Productuom::className(), ['uomId' => 'uomId']);
    }

    /**
     * Gets query for [[CreatedBy0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'createdBy']);
    }

    /**
     * Gets query for [[Productcategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductcategories()
    {
        return $this->hasMany(Productcategory::className(), ['productId' => 'productId']);
    }
}
