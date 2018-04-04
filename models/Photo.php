<?php

namespace vendor\landing\partner\models;

use Yii;

/**
 * This is the model class for table "Photo".
 *
 * @property int $id
 * @property string $file
 * @property string $file_small
 * @property string $type
 * @property int $object_id
 * @property int $user_id
 * @property int $deleted
 * @property int $created_at
 * @property int $updated_at
 */
class Photo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Photo';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file', 'file_small', 'type'], 'required'],
            [['object_id', 'user_id', 'deleted', 'created_at', 'updated_at'], 'integer'],
            [['file', 'file_small'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 32],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Logo::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
	/* public function beforeSave($insert){
		
		if (parent::beforeSave($insert)) {
	    $some = Yii::createObject(SomeAccessories::className());
		$a = $this->maximuId()->id;
		
		$this->phone_digital = $some->NumberUser($this->phone_digital);
		$this->client_id = $a;
		
            return true;
        } else {
            return false;
        }
		
	} */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file' => 'File',
            'file_small' => 'File Small',
            'type' => 'Type',
            'object_id' => 'Object ID',
            'user_id' => 'User ID',
            'deleted' => 'Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
