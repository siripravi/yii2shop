<?php

/**
 * Project: yii2-blog for internal using
 * Author: admin\modules
 * Copyright (c) 2018.
 */

namespace admin\modules\page\traits;
use yii;
use admin\modules\page\Module;

interface IActiveStatus
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_ARCHIVE = -1;
}

trait StatusTrait
{
    public static function getStatusList()
    {
        return [
            IActiveStatus::STATUS_INACTIVE => Yii::t('page', 'STATUS_INACTIVE'),
            IActiveStatus::STATUS_ACTIVE => Yii::t('page', 'STATUS_ACTIVE'),
            IActiveStatus::STATUS_ARCHIVE => Yii::t('page', 'STATUS_DELETED')
        ];
    }

    public function getStatusList2()
    {
        return self::getStatusList();
    }

    public function getStatus($nullLabel = '')
    {
        $statuses = static::getStatusList();
        return (isset($this->status) && isset($statuses[$this->status])) ? $statuses[$this->status] : $nullLabel;
    }
}
