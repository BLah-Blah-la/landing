<?php

namespace vendor\landing\partner\models;

use Yii;

/**
 * This is the model class for table "price_list".
 *
 * @property int $id
 * @property string $name
 * @property string $value
 * @property string $terms
 * @property string $description
 *
 * @property Customers[] $customers
 */
class PriceList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price_list';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['name'], 'string', 'max' => 20],
            [['value', 'terms'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('modules/notifications', 'Name'),
            'value' => Yii::t('modules/notifications', 'Value'),
            'terms' => Yii::t('modules/notifications', 'Terms'),
            'description' => Yii::t('modules/notifications', 'Description'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasOne(Customers::className(), ['price_name' => 'id']);
    }
}
