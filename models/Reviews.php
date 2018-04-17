<?php

namespace vendor\landing\partner\models;

use Yii;
use vendor\landing\partner\models\Customers;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\lopez;

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
			'name' => Yii::t('modules/notifications', 'Name'),
			'surname' => Yii::t('modules/notifications', 'Surname'),
			'status' => Yii::t('modules/notifications', 'Status'),
            'text' => Yii::t('modules/notifications', 'Text'),
            'image' => Yii::t('modules/notifications', 'Image'),
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
		
    public function savePreview($path, $path_one, $path_two){
       $preview = new lopez();
	   $this->preview = $preview->square_preview('partner/' . $path, 200, $path_one, $path_two);
	   return true;
	}
	
	public function beforeSave($insert){
		
		if(parent::beforeSave($insert)){
			
			$id = Yii::$app->request->get('id');
			$i = (integer)0;
			
		    $one = Reviews::find()->select(['preview', 'image'])->where(['id' => $id])->all();
			
			if($one[$i++]['preview'] || $one[$i++]['image'] !== NULL):
				
				foreach($one as $var):
				unlink('partner/' . $var->preview);
				unlink('partner/' . $var->image);
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
		    $one = Reviews::find()->select(['preview', 'image'])->where(['id' => $id])->all();
			$i = (integer)0;
			
			if($one[$i++]['preview'] || $one[$i++]['image'] !== NULL):
			foreach($one as $var):
			
			unlink('partner/' . $var->preview);
			unlink('partner/' . $var->image);
			
			endforeach;
			
			endif;
			
			return true;
		} else {
				
			return false;
		}
		
		
	}
}
