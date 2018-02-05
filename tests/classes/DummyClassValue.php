<?php

namespace Gregoriohc\Byname\Tests\Classes;

class DummyClassValue extends DummyClass
{
    protected static function bynameValue()
    {
        return 'MyName';
    }
}