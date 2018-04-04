<?php

namespace vendor\landing\partner\models;

use Yii;
use vendor\landing\partner\models\Customers;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
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
    public $img;
	
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

            [['text'], 'string'],
			[['img'], 'file', 'extensions' => 'png, jpg'],
            [['image', 'name', 'surname', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
			'name' => 'Name',
			'surname' => 'Surname',
			'status' => 'Status',
            'text' => 'Text',
            'image' => 'Image',
        ];
    }
    public function customersList(){
		
		$customers = 
		Customers::find()
		->select(['id', 'avatar'])
		->all();
	
		$data = ArrayHelper::map($customers, 'id', 'avatar');
		
		return $data;
		
	}
	
	public function upload($path)
	{
		$this->image = $path;
		
		return true;
		
		}
}
