<?php

namespace app\modules\page\traits;
use yii;
use app\modules\page\Module;

trait ModuleTrait
{
    /**
     * @return Module
     */
    public function getModule()
    {
        return \Yii::$app->getModule('page');
    }

}
