<?php

namespace vendor\landing\partner;

/**
 * Module module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'vendor\landing\partner\controllers';
    
	public $dbConnection = 'db2';
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
	
	public function getDb()
    {
        return \Yii::$app->get($this->dbConnection);
    }
	
	
}
