<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "payments".
 *
 * @property int $paymentId
 * @property int $orderId
 * @property int $amount
 * @property int $userId
 * @property int $paymentMethodId
 * @property string $status
 * @property string $createdAt
 * @property int $createdBy
 *
 * @property Orders $order
 * @property Paymentmethods $paymentMethod
 * @property User $user
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderId', 'amount', 'userId', 'paymentMethodId', 'status', 'createdBy'], 'required'],
            [['orderId', 'amount', 'userId', 'paymentMethodId', 'createdBy'], 'integer'],
            [['status'], 'string'],
            [['createdAt'], 'safe'],
            [['orderId'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['orderId' => 'orderId']],
            [['paymentMethodId'], 'exist', 'skipOnError' => true, 'targetClass' => Paymentmethods::className(), 'targetAttribute' => ['paymentMethodId' => 'paymentMethodId']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'paymentId' => 'Payment ID',
            'orderId' => 'Order ID',
            'amount' => 'Amount',
            'userId' => 'User ID',
            'paymentMethodId' => 'Payment Method ID',
            'status' => 'Status',
            'createdAt' => 'Created At',
            'createdBy' => 'Created By',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['orderId' => 'orderId']);
    }

    /**
     * Gets query for [[PaymentMethod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentMethod()
    {
        return $this->hasOne(Paymentmethods::className(), ['paymentMethodId' => 'paymentMethodId']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}
