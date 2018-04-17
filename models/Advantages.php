<?php

namespace vendor\landing\partner\models;

use Yii;
use backend\models\lopez;
/**
 * This is the model class for table "advantages".
 *
 * @property int $id
 * @property string $logo
 * @property string $description
 */
class Advantages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	
	public $img;
	
    public static function tableName()
    {
        return 'advantages';
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
            [['logo', 'preview'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
			'img' => Yii::t('modules/notifications', 'Image'),
            'logo' => Yii::t('modules/notifications', 'Logo'),
            'description' => Yii::t('modules/notifications', 'Description'),
        ];
    }
	public function upload($path)
    {
		$this->logo = $path;
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
			
		    $one = Advantages::find()->select(['preview', 'logo'])->where(['id' => $id])->all();
			
			if($one[$i++]['preview'] || $one[$i++]['logo'] !== NULL):
				
				foreach($one as $var):
				unlink('partner/' . $var->preview);
				unlink('partner/' . $var->logo);
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
		    $one = Advantages::find()->select(['preview', 'logo'])->where(['id' => $id])->all();
			$i = (integer)0;
			
			if($one[$i++]['preview'] || $one[$i++]['logo'] !== NULL):
			foreach($one as $var):
			
			unlink('partner/' . $var->preview);
			unlink('partner/' . $var->logo);
			
			endforeach;
			
			endif;
			
			return true;
		} else {
				
			return false;
		}
		
		
	}
}
