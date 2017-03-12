<?php

namespace Dhii\I18n\FuncTest\Exception;

use Xpmock\TestCase;
use Dhii\Data\ValueAwareInterface as Value;

/**
 * Tests {@see \Dhii\I18n\Exception\AbstractStringTranslationException}.
 *
 * @since [*next-version*]
 */
class AbstractStringTranslationExceptionTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\\I18n\\Exception\\AbstractStringTranslationException';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return \Dhii\I18n\Exception\AbstractStringTranslationException
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->new();

        return $mock;
    }

    /**
     * Creates a new instance of a translator.
     *
     * @since [*next-version*]
     *
     * @return Value The new instance.
     */
    protected function _createValue()
    {
        return $this->mock('Dhii\\Data\\ValueAwareInterface')
                ->getValue()
                ->new();
    }

    /**
     * Tests whether a valid instance of the test subject can be created.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance();

        $this->assertInstanceOf(static::TEST_SUBJECT_CLASSNAME, $subject, 'A valid instance of the test subject could not be created');
        $this->assertInstanceOf('Exception', $subject, 'Subject does not extend required ancestor');
    }

    /**
     * Tests to make sure that the context getter and setter work correctly.
     *
     * @since [*next-version*]
     */
    public function testGetSetContext()
    {
        $subject = $this->createInstance();
        $reflection = $this->reflect($subject);
        $value = $this->_createValue();

        $this->assertNull($reflection->_getContext(), 'The initial value of context is wrong');
        $reflection->_setContext($value);
        $this->assertEquals($value, $reflection->_getContext(), 'The value of context is wrong');
    }
}
