<?php
namespace vendor\landing\partner;

/**
 * notifications module bootstrap class.
 */
class Bootstrap implements \yii\base\BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        // add module I18N category
        if (!isset($app->i18n->translations['modules/partner/*'])) {
            $app->i18n->translations['modules/partner*'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en-US',
                'basePath' => '@vendor/landing/partner/messages',
            ];
        }
    }
}
