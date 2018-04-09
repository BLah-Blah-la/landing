<?php

namespace vendor\landing\partner\models;

use Yii;
use vendor\landing\partner\models\Customers;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "portfolio".
 *
 * @property int $id
 * @property int $id_customer
 * @property string $image_site
 *
 * @property Customers $customer
 */
class Portfolio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $image;
    
	public static function tableName()
    {
        return 'portfolio';
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
             
            [['image_site', 'name_company'], 'string', 'max' => 255],
       
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_company' => 'Name Company',
            'image_site' => 'Image Site',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
	
	public function customersList(){
		
		$customers = 
		Customers::find()
		->select(['id', 'phone_digital'])
		->all();
		
		$data = ArrayHelper::map($customers, 'id', 'phone_digital');
		
		return $data;
		
	}
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customers::className(), ['id' => 'id_customer']);
    }
	
	public function upload($path)
	{
		$this->image_site = $path;
		return true;
		
		}
    public function getAvatar(){
		
		$customer = $this->customer;
		
		return $customer->avatar;
		
	}
}