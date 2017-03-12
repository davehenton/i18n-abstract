<?php

namespace Dhii\I18n\FuncTest;

use Xpmock\TestCase;

/**
 * Tests {@see \Dhii\I18n\AbstractFormatTranslator}.
 *
 * @since [*next-version*]
 */
class AbstractFormatTranslatorTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\\I18n\\AbstractFormatTranslator';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return \Dhii\I18n\AbstractFormatTranslator
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->_createI18nException()
            ->_createTranslationException()
            ->_createStringTranslationException()
            ->_createFormatTranslationException()
            ->_translateString(function ($string) {
                return $string.'!!';
            })
            ->_interpolateParams(function ($string, $params) {
                return vsprintf($string, $params);
            })
            ->new();

        return $mock;
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
    }

    /**
     * Tests that `_translate()` behaves correctly.
     *
     * @since [*next-version*]
     */
    public function testTranslateWithInterpolation()
    {
        $subject = $this->createInstance();
        $subject->mock()->_interpolateParams(array(
                    $this->anything(),
                    $this->anything(),
                ), $this->exactly(1));

        $string = 'Today I ate a %1$s and an %2$s';
        $params = array('banana', 'apple');
        $context = null;
        $reflection = $this->reflect($subject);

        $result = $reflection->_translate($string, $context, $params);

        $this->assertInternalType('string', $result, 'Translation result is not of the expected type');
        $this->assertContains($params[0], $result, 'First parameter did not get interpolated');
        $this->assertContains($params[1], $result, 'Second parameter did not get interpolated');
    }
}
