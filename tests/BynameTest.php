<?php

namespace Gregoriohc\Byname\Tests;

use Gregoriohc\Byname\Tests\Classes\DummyClass;
use Gregoriohc\Byname\Tests\Classes\DummyClassSuffix;
use Gregoriohc\Byname\Tests\Classes\DummyClassValue;
use Gregoriohc\Byname\Tests\Classes\PrefixDummyClass;
use Gregoriohc\Byname\Tests\Classes\PrefixDummyClassSuffix;

/**
 * @runTestsInSeparateProcesses
 */
class BynameTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test can get class bynames
     */
    public function testCanGetClassBynames()
    {
        $this->assertEquals('DummyClass', DummyClass::byname());
        $this->assertEquals('dummy_class', DummyClass::bynameSnake());
        $this->assertEquals('DummyClass', DummyClass::bynameStudly());
        $this->assertEquals('dummyClass', DummyClass::bynameCamel());

        $this->assertEquals('DummyClass', PrefixDummyClass::byname());
        $this->assertEquals('dummy_class', PrefixDummyClass::bynameSnake());
        $this->assertEquals('DummyClass', PrefixDummyClass::bynameStudly());
        $this->assertEquals('dummyClass', PrefixDummyClass::bynameCamel());

        $this->assertEquals('DummyClass', DummyClassSuffix::byname());
        $this->assertEquals('dummy_class', DummyClassSuffix::bynameSnake());
        $this->assertEquals('DummyClass', DummyClassSuffix::bynameStudly());
        $this->assertEquals('dummyClass', DummyClassSuffix::bynameCamel());

        $this->assertEquals('DummyClass', PrefixDummyClassSuffix::byname());
        $this->assertEquals('dummy_class', PrefixDummyClassSuffix::bynameSnake());
        $this->assertEquals('DummyClass', PrefixDummyClassSuffix::bynameStudly());
        $this->assertEquals('dummyClass', PrefixDummyClassSuffix::bynameCamel());
    }

    /**
     * Test can get object bynames
     */
    public function testCanGetObjectBynames()
    {
        $dummyObject = new DummyClass();
        $this->assertEquals('DummyClass', $dummyObject->byname());
        $this->assertEquals('dummy_class', $dummyObject->bynameSnake());
        $this->assertEquals('DummyClass', $dummyObject->bynameStudly());
        $this->assertEquals('dummyClass', $dummyObject->bynameCamel());

        $dummyObject = new PrefixDummyClass();
        $this->assertEquals('DummyClass', $dummyObject->byname());
        $this->assertEquals('dummy_class', $dummyObject->bynameSnake());
        $this->assertEquals('DummyClass', $dummyObject->bynameStudly());
        $this->assertEquals('dummyClass', $dummyObject->bynameCamel());

        $dummyObject = new DummyClassSuffix();
        $this->assertEquals('DummyClass', $dummyObject->byname());
        $this->assertEquals('dummy_class', $dummyObject->bynameSnake());
        $this->assertEquals('DummyClass', $dummyObject->bynameStudly());
        $this->assertEquals('dummyClass', $dummyObject->bynameCamel());

        $dummyObject = new PrefixDummyClassSuffix();
        $this->assertEquals('DummyClass', $dummyObject->byname());
        $this->assertEquals('dummy_class', $dummyObject->bynameSnake());
        $this->assertEquals('DummyClass', $dummyObject->bynameStudly());
        $this->assertEquals('dummyClass', $dummyObject->bynameCamel());
    }

    /**
     * Test can use custom byname snake delimiter
     */
    public function testCanUseCustomSnakeDelimiter()
    {
        $this->assertEquals('dummy-class', DummyClass::bynameSnake('-'));
    }

    /**
     * Test can use custom byname value
     */
    public function testCanUseCustomValue()
    {
        $this->assertEquals('MyName', DummyClassValue::byname());
        $this->assertEquals('my_name', DummyClassValue::bynameSnake());
        $this->assertEquals('MyName', DummyClassValue::bynameStudly());
        $this->assertEquals('myName', DummyClassValue::bynameCamel());
    }
}
