<?php

namespace Dhii\I18n\Exception;

use Dhii\Data\ValueAwareInterface as Value;

/**
 * Common functionality for string translation exceptions.
 *
 * @since [*next-version*]
 */
abstract class AbstractStringTranslationException extends AbstractTranslationException
{
    /**
     * The context of the string being translated.
     *
     * @since [*next-version*]
     *
     * @var Value
     */
    protected $context;

    /**
     * Associates a translation context with this instance.
     *
     * @since [*next-version*]
     *
     * @param string|Value $context The translation context.
     *
     * @return $this This instance.
     */
    protected function _setContext($context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * Retrieves the context of the string being translated.
     *
     * @since [*next-version*]
     *
     * @return string|Value|null The translation context, if any.
     */
    protected function _getContext()
    {
        return $this->context;
    }
}
