<?php

namespace vendor\landing\partner\traits;

use vendor\landing\partner\Module;

/**
 * Trait ModuleTrait
 *
 * @property-read Module $module
 * @package dektrium\user\traits
 */
trait ModuleTrait
{
    /**
     * @return Module
     */
    public function getModule()
    {
        return \Yii::$app->getModule('partner');
    }

    /**
     * @return string
     */
    public static function getDb()
    {
        return \Yii::$app->getModule('partner')->getDb();
    }
}