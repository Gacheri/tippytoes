<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "productimage".
 *
 * @property int $imageId
 * @property string $imagePath
 * @property int $productId
 */
class Productimage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productimage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imagePath', 'productId'], 'required'],
            [['productId'], 'integer'],
            [['imagePath'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'imageId' => 'Image ID',
            'imagePath' => 'Add Image',
            'productId' => 'Product ID',
        ];
    }
}
