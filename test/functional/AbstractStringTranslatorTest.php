<?php

namespace Dhii\I18n\FuncTest;

use Xpmock\TestCase;

/**
 * Tests {@see \Dhii\I18n\AbstractStringTranslator}.
 *
 * @since 0.1
 */
class AbstractStringTranslatorTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since 0.1
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\\I18n\\AbstractStringTranslator';

    /**
     * Creates a new instance of the test subject.
     *
     * @since 0.1
     *
     * @return \Dhii\I18n\AbstractStringTranslator
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->_createI18nException()
            ->_createTranslationException()
            ->_createStringTranslationException()
            ->_translateString(function ($string) {
                return $string.'!!';
            })
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
    }

    /**
     * Tests that `_translate()` behaves correctly.
     *
     * @since 0.1
     */
    public function testTranslate()
    {
        $subject = $this->createInstance();
        $arg1 = 'apple';

        $reflection = $this->reflect($subject);
        $result = $reflection->_translate($arg1);

        $this->assertInternalType('string', $result, 'Translation result is not of the expected type');
    }
}
