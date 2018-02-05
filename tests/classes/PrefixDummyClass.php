<?php

namespace Gregoriohc\Byname\Tests\Classes;

class PrefixDummyClass extends DummyClass
{
    protected static function bynamePrefix()
    {
        return 'Prefix';
    }
}