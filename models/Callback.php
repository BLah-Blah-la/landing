<?php

namespace vendor\landing\partner\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "callback".
 *
 * @property int $id
 * @property string $name
 * @property string $phone_digital
 * @property string $email
 * @property int $created_at
 * @property int $updated_at
 * @property string $status
 */
class Callback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'callback';
    }
    public function behaviors()
	{
		return [
		TimestampBehavior::className(),
	];
	}
		
    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'email', 'status'], 'string', 'max' => 255],
            [['phone_digital'], 'string', 'max' => 10],
			[['email'], 'email', 'message' => 'Не правильно введен адрес почты'],
			[['email'], 'unique', 'targetAttribute' => ['email'], 'message' => 'Такой адрес уже зарегистрирован'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('modules/notifications', 'Name'),
            'phone_digital' => Yii::t('modules/notifications', 'Phone Digital'),
            'email' => Yii::t('modules/notifications', 'Email'),
            'created_at' => Yii::t('modules/notifications', 'created_at'),
            'updated_at' => Yii::t('modules/notifications', 'updated_at'),
            'status' => Yii::t('modules/notifications', 'Status'),
        ];
    }
	
}
