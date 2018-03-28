<?php

namespace vendor\landing\partner\models;

use Yii;

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
			[['img'], 'file', 'extensions' => 'png', 'jpg'],
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
            'title_item' => 'Title Item',
            'description' => 'Description',
            'image' => 'Image',
        ];
    }
	
	public function upload($path)
    {
		$this->image = $path;
		return true;
		}
}
