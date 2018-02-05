<?php

namespace Gregoriohc\Byname\Tests\Classes;

class DummyClassSuffix extends DummyClass
{
    protected static function bynameSuffix()
    {
        return 'Suffix';
    }
}