<?php

namespace vendor\landing\partner\models;

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
            'image_item' => 'Image Item',
            'dynamic_string' => 'Dynamic String',
        ];
    }
	public function upload($path)
    {
		$this->image_item = $path;
		return true;
		}
}
