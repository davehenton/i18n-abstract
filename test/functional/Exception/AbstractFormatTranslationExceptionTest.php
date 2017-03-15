<?php

namespace Dhii\I18n\FuncTest\Exception;

use Xpmock\TestCase;

/**
 * Tests {@see \Dhii\I18n\Exception\AbstractFormatTranslationException}.
 *
 * @since 0.1
 */
class AbstractFormatTranslationExceptionTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since 0.1
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\\I18n\\Exception\\AbstractFormatTranslationException';

    /**
     * Creates a new instance of the test subject.
     *
     * @since 0.1
     *
     * @return \Dhii\I18n\Exception\AbstractFormatTranslationException
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->new();

        return $mock;
    }

    /**
     * Tests whether a valid instance of the test subject can be created.
     *
     * @since 0.1
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance();

        $this->assertInstanceOf(static::TEST_SUBJECT_CLASSNAME, $subject, 'A valid instance of the test subject could not be created');
        $this->assertInstanceOf('Exception', $subject, 'Subject does not extend required ancestor');
    }

    /**
     * Tests to make sure that the interpolation params getter and setter work correctly.
     *
     * @since 0.1
     */
    public function testGetSetInterpolationParams()
    {
        $subject = $this->createInstance();
        $reflection = $this->reflect($subject);
        $value = array('banana', 'apple');

        $this->assertNull($reflection->_getInterpolationParams(), 'The initial value of interpolation params is wrong');
        $reflection->_setInterpolationParams($value);
        $this->assertEquals($value, $reflection->_getInterpolationParams(), 'The value of interpolation params is wrong');
    }
}
