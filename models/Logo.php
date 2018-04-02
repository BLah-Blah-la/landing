<?php

namespace vendor\landing\partner\models;

use Yii;

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
    function behaviors()
    {
        return [
            'images' => [
                'class' => 'dvizh\gallery\behaviors\AttachImages',
                'mode' => 'gallery',
                'quality' => 60,
                'galleryId' => 'picture'
            ],
        ];
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
            'logo_image' => 'Logo Image',
        ];
    }
	
    public function upload($path)
    {
		$this->logo_image = $path;
		return true;
		}
}
