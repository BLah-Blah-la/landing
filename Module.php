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
        /* $this->registerTranslations(); */
    }

    public function registerTranslations()
    {
         // add module I18N category
       Yii::$app->i18n->translations['modules/partner/*'] = [
            'class'          => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath'       => '@vendor/landing/partner/messages',
        ];
    }
	public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/partner/' . $category, $message, $params, $language);
    }

	public function getDb()
    {
        return \Yii::$app->get($this->dbConnection);
    }
	
	
}
