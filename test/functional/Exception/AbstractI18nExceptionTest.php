<?php

namespace Dhii\I18n\FuncTest\Exception;

use Xpmock\TestCase;

/**
 * Tests {@see \Dhii\I18n\Exception\AbstractI18nException}.
 *
 * @since 0.1
 */
class AbstractI18nExceptionTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since 0.1
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\\I18n\\Exception\\AbstractI18nException';

    /**
     * Creates a new instance of the test subject.
     *
     * @since 0.1
     *
     * @return \Dhii\I18n\Exception\AbstractI18nException
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
     * Tests whether the protected constructor behaves correctly.
     *
     * Currently, correct behaviour is to simply not result in an error.
     *
     * @since 0.1
     */
    public function testConstruct()
    {
        $subject = $this->createInstance();
        $reflection = $this->reflect($subject);

        $reflection->_construct();
    }
}
