<?php

namespace vendor\landing\partner\models;

use Yii;
use yii\helpers\ArrayHelper;
use vendor\landing\partner\models\PriceList;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "customers".
 *
 * @property int $id
 * @property int $price_name
 * @property string $name
 * @property string $email
 * @property string $phone_digital
 * @property int $declared_in
 * @property string $name_company
 * @property string $status
 * @property string $avatar
 *
 * @property PriceList $priceName
 * @property Portfolio[] $portfolios
 * @property Reviews[] $reviews
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $ava;
	
    public static function tableName()
    {
        return 'customers';
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
		    [['ava'], 'file', 'extensions' => 'png, jpg'],
            [['price_name', 'created_at', 'updated_at'], 'integer'],
            [['name', 'surname', 'email', 'name_company', 'status', 'avatar'], 'string', 'max' => 255],
            [['phone_digital'], 'string'],
			[['email'], 'email', 'message' => 'Не правильно введен адрес почты'],
			[['phone_digital'], 'unique', 'targetAttribute' => ['phone_digital'], 'message' => 'Такой номер уже зарегистрирован'],
            [['price_name'], 'exist', 'skipOnError' => true, 'targetClass' => PriceList::className(), 'targetAttribute' => ['price_name' => 'id']],
			
        ];
    }

    /**
     * @inheritdoc
     */
	public function behaviors(){
		return [
		TimestampBehavior::className(),
		];
		}
		
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price_name' => Yii::t('modules/notifications', 'Price Name'),
            'name' => Yii::t('modules/notifications','Name'),
            'email' => Yii::t('modules/notifications', 'Email'),
            'phone_digital' => Yii::t('modules/notifications','Phone Digital'),
            'status' => Yii::t('modules/notifications','Status'),
			'created_at' => Yii::t('modules/notifications', 'created_at'),
            'updated_at' => Yii::t('modules/notifications', 'updated_at'),
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrice()
    {
        return $this->hasOne(PriceList::className(), ['id' => 'price_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolios()
    {
        return $this->hasOne(Portfolio::className(), ['id_customer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
	public function priceList(){
		
		$price_list = 
		PriceList::find()
		->select(['id', 'name'])
		->all();
		
		$data = ArrayHelper::map($price_list, 'id', 'name');
		
		return $data;
		
	}
	
    public function getReviews()
    {
        return $this->hasOne(Reviews::className(), ['id_customer' => 'id']);
		
    }
	
	/* public function beforeSave($insert){
		if(parent::beforeSave($insert)){
			
			$this->declared_in = time();
			
			return true;
			
		} else {
			
			return false;
		}
	} */
	public function upload($path)
	{
		$this->avatar = $path;
		return true;
		
		}
	
	
}
