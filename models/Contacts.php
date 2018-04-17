<?php

namespace vendor\landing\partner\models;
use backend\models\lopez;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string $image_item
 * @property string $dynamic_string
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $img;
	
    public static function tableName()
    {
        return 'contacts';
    }
    
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
		    [['img'], 'file', 'extensions' => 'png, jpg'],
            [['image_item', 'dynamic_string'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_item' => Yii::t('modules/notifications', 'Image'),
            'dynamic_string' => Yii::t('modules/notifications', 'Dynamic String'),
        ];
    }
	public function upload($path)
    {
		$this->image_item = $path;
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
			
		    $one = Contacts::find()->select(['preview', 'image_item'])->where(['id' => $id])->all();
			
			if($one[$i++]['preview'] || $one[$i++]['image_item'] !== NULL):
				
				foreach($one as $var):
				unlink('partner/' . $var->preview);
				unlink('partner/' . $var->image_item);
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
		    $one = Contacts::find()->select(['preview', 'image_item'])->where(['id' => $id])->all();
			$i = (integer)0;
			
			if($one[$i++]['preview'] || $one[$i++]['image_item'] !== NULL):
			foreach($one as $var):
			
			unlink('partner/' . $var->preview);
			unlink('partner/' . $var->image_item);
			
			endforeach;
			
			endif;
			
			return true;
		} else {
				
			return false;
		}
		
		
	}	

}
