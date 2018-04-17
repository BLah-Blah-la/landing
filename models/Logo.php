<?php

namespace vendor\landing\partner\models;
use Yii;
use backend\models\lopez;

/**
 * This is the model class for table "logo".
 *
 * @property int $id
 * @property string $logo_image
 */
class Logo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $img;
	
    public static function tableName()
    {
        return 'logo';
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
		    [['img'], 'file', 'extensions' => 'png, jpg'],
            [['logo_image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
			'img' => Yii::t('modules/notifications', 'img'),
            'logo_image' => Yii::t('modules/notifications', 'Image'),
        ];
    }
	
    public function upload($path)
    {
		$this->logo_image = $path;
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
			
		    $one = Logo::find()->select(['preview', 'logo_image'])->where(['id' => $id])->all();
			
			if($one[$i++]['preview'] || $one[$i++]['logo_image'] !== NULL):
				
				foreach($one as $var):
				unlink('partner/' . $var->preview);
				unlink('partner/' . $var->logo_image);
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
		    $one = Logo::find()->select(['preview', 'logo_image'])->where(['id' => $id])->all();
			$i = (integer)0;
			
			if($one[$i++]['preview'] || $one[$i++]['logo_image'] !== NULL):
			foreach($one as $var):
			
			unlink('partner/' . $var->preview);
			unlink('partner/' . $var->logo_image);
			
			endforeach;
			
			endif;
			
			return true;
		} else {
				
			return false;
		}
		
		
	}	
}
