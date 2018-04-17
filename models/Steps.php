<?php

namespace vendor\landing\partner\models;

use Yii;
use backend\models\lopez;
/**
 * This is the model class for table "steps".
 *
 * @property int $id
 * @property string $title_item
 * @property string $description
 * @property string $image
 */
class Steps extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $img;
	
    public static function tableName()
    {
        return 'steps';
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
			[['img'], 'file', 'extensions' => 'png, jpg'],
            [['title_item'], 'string', 'max' => 30],
            [['image'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_item' => Yii::t('modules/notifications', 'Title Item'),
            'description' => Yii::t('modules/notifications', 'Description'),
            'image' => Yii::t('modules/notifications', 'Image'),
			'img' => Yii::t('modules/notifications', 'Image'),
        ];
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
			
		    $one = Steps::find()->select(['preview', 'image'])->where(['id' => $id])->all();
			
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
		    $one = Steps::find()->select(['preview', 'image'])->where(['id' => $id])->all();
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
