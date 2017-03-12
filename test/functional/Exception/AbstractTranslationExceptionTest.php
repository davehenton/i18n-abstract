<?php

namespace Dhii\I18n\FuncTest\Exception;

use Xpmock\TestCase;
use Dhii\I18n\TranslatorInterface;

/**
 * Tests {@see \Dhii\I18n\Exception\AbstractTranslationException}.
 *
 * @since [*next-version*]
 */
class AbstractTranslationExceptionTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\\I18n\\Exception\\AbstractTranslationException';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return \Dhii\I18n\Exception\AbstractTranslationException
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
     * @return TranslatorInterface The new instance.
     */
    protected function _createTranslator()
    {
        return $this->mock('Dhii\\I18n\\TranslatorInterface')
                ->translate()
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
     * Tests to make sure that the subject getter and setter work correctly.
     *
     * @since [*next-version*]
     */
    public function testGetSetSubject()
    {
        $subject = $this->createInstance();
        $reflection = $this->reflect($subject);
        $value = 'banana';

        $this->assertNull($reflection->_getSubject(), 'The initial value of translation subject is wrong');
        $reflection->_setSubject($value);
        $this->assertEquals($value, $reflection->_getSubject(), 'The value of translation subject is wrong');
    }

    /**
     * Tests to make sure that the translator getter and setter work correctly.
     *
     * @since [*next-version*]
     */
    public function testGetSetTranslator()
    {
        $subject = $this->createInstance();
        $reflection = $this->reflect($subject);
        $value = $this->_createTranslator();

        $this->assertNull($reflection->_getTranslator(), 'The initial value of translator is wrong');
        $reflection->_setTranslator($value);
        $this->assertEquals($value, $reflection->_getTranslator(), 'The value of translator is wrong');
    }
}
