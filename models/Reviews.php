<?php

namespace vendor\landing\partner\models;

use Yii;
use vendor\landing\partner\models\Customers;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property int $id_customer
 * @property string $text
 * @property string $image_site
 *
 * @property Customers $customer
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
   	*/
    public $image;
	
	public static function tableName()
    {
        return 'reviews';
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
            [['id_customer'], 'integer'],
            [['text'], 'string'],
			[['image'], 'file', 'extensions' => 'png, jpg'],
            [['image_site'], 'string', 'max' => 255],
            [['id_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['id_customer' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_customer' => 'Id Customer',
            'text' => 'Text',
            'image_site' => 'Image Site',
        ];
    }
    public function customersList(){
		
		$customers = 
		Customers::find()
		->select(['id', 'email'])
		->all();
		
		$data = ArrayHelper::map($customers, 'id', 'email');
		
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
