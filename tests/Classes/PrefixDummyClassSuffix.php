<?php

namespace Gregoriohc\Byname\Tests\Classes;

class PrefixDummyClassSuffix extends PrefixDummyClass
{
    protected static function bynameSuffix()
    {
        return 'Suffix';
    }
}