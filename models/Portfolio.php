<?php

namespace vendor\landing\partner\models;

use Yii;
use vendor\landing\partner\models\Customers;
use yii\helpers\ArrayHelper;
use backend\models\lopez;

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
            [['image'], 'file', 'extensions' => 'png, jpg'], 
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
            'name_company' => Yii::t('modules/notifications', 'Name Company'),
            'image_site' => Yii::t('modules/notifications', 'Image'),
			'image' => Yii::t('modules/notifications', 'Image'),
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
	public function savePreview($path, $path_one, $path_two){
       $preview = new lopez();
	   $this->preview = $preview->square_preview('partner/' . $path, 200, $path_one, $path_two);
	   return true;
	}
	
	public function beforeSave($insert){
		
		if(parent::beforeSave($insert)){
			
			$id = Yii::$app->request->get('id');
			$i = (integer)0;
			
		    $one = Portfolio::find()->select(['preview', 'image_site'])->where(['id' => $id])->all();
			
			if($one[$i++]['preview'] || $one[$i++]['image_site'] !== NULL):
				
				foreach($one as $var):
				unlink('partner/' . $var->preview);
				unlink('partner/' . $var->image_site);
				endforeach;
				
			endif;
			
			return true;
			
		} else {
			
			return false;
		}
	}
	
	
	public function beforeDelete(){
		
		if(parent::beforeDelete()){
			
			$id = Yii::$app->request->get('id');
		    $one = Portfolio::find()->select(['preview', 'image_site'])->where(['id' => $id])->all();
			$i = (integer)0;
			
			if($one[$i++]['preview'] || $one[$i++]['image_site'] !== NULL):
			foreach($one as $var):
			
			unlink('partner/' . $var->preview);
			unlink('partner/' . $var->image_site);
			
			endforeach;
			
			endif;
			
			return true;
		} else {
				
			return false;
		}
		
		
	}	
}