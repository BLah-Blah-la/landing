<?php

namespace vendor\landing\partner\models;

use Yii;

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
	
	function behaviors()
    {
        return [
            'images' => [
                'class' => 'dvizh\gallery\behaviors\AttachImages',
                'mode' => 'gallery',
                'quality' => 2,
                'galleryId' => 'picture'
            ],
        ];
    }
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
            [['logo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'logo' => 'Logo',
            'description' => 'Description',
        ];
    }
	
	public function upload($path)
    {
		$this->logo = $path;
		return true;
		}
}
