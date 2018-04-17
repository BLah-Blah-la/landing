<?php

namespace vendor\landing\partner\models;

use Yii;

/**
 * This is the model class for table "titles".
 *
 * @property int $id
 * @property string $section
 * @property string $text
 */
class Titles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'titles';
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
            [['section'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section' => Yii::t('modules/notifications', 'Section'),
            'text' => Yii::t('modules/notifications', 'Text'),
        ];
    }
}
