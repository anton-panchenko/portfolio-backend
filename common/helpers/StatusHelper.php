<?php
namespace common\helpers;

class StatusHelper
{
    const DRAFT = 0;
    const ACTIVE = 1;

    public static function labels()
    {
        return [
            self::DRAFT => 'DRAFT',
            self::ACTIVE => 'ACTIVE'
        ];
    }
}