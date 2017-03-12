<?php

namespace Dhii\I18n;

use ArrayAccess as Map;
use Dhii\Data\ValueAwareInterface as Value;
use Dhii\Util\String\StringableInterface as Stringable;
use Dhii\I18n\Exception\TranslationExceptionInterface;
use Dhii\I18n\Exception\I18nExceptionInterface;

/**
 * Common functionality for format string translators.
 *
 * @since [*next-version*]
 */
abstract class AbstractFormatTranslator extends AbstractStringTranslator
{
    /**
     * Translates a string format.
     *
     * @since [*next-version*]
     *
     * @param string|Stringable $string  The string to translate.
     * @param string|Value|null $context The context for the string, if any.
     * @param string|Map|null   $params  Format parameters for interpolation.
     *
     * @throws TranslationExceptionInterface If problem translating.
     * @throws I18nExceptionInterface        If a problem not directly related to translating occurs.
     *
     * @return string The translated string, with parameters interpolated.
     */
    protected function _translate($string, $context = null, $params = null)
    {
        $string = parent::_translate($string, $context);
        if (!is_null($params)) {
            $string = $this->_interpolateParams($string, $params);
        }

        return $string;
    }

    /**
     * Interpolates given parameters into the specified string.
     *
     * @since [*next-version*]
     *
     * @param array|Map $params The parameter map to interpolate into the string.
     * 
     * @throws I18nExceptionInterface If a problem not directly related to translating occurs.
     *
     * @return string The string with parameters interpolated into it.
     */
    abstract protected function _interpolateParams($string, $params);

    /**
     * Creates a new instance of a string translation exception.
     *
     * @since [*next-version*]
     * @see \Exception::__construct()
     *
     * @param string              $message
     * @param int                 $code
     * @param \Exception          $previous
     * @param mixed               $subject    The subject which is being translated, if any.
     * @param TranslatorInterface $translator The translator which is performing the translation, if any
     * @param Value|null          $context    The string context, if any.
     * @param Map|null            $params     The interpolation params, if any.
     *
     * @return StringTranslationExceptionInterface The new exception.
     */
    abstract protected function _createFormatTranslationException(
            $message,
            $code = 0,
            \Exception $previous = null,
            $subject = null,
            TranslatorInterface $translator = null,
            $context = null,
            $params = null);
}
