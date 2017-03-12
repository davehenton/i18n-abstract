<?php

namespace Dhii\I18n\Exception;

use Dhii\I18n\TranslatorInterface;

/**
 * Common functionality for translation exceptions.
 *
 * @since [*next-version*]
 */
abstract class AbstractTranslationException extends AbstractI18nException
{
    /**
     * The translator performing the translation.
     *
     * @since [*next-version*]
     *
     * @var TranslatorInterface
     */
    protected $translator;

    /**
     * The subject being translated.
     *
     * @since [*next-version*]
     *
     * @var mixed
     */
    protected $subject;

    /**
     * Associates a translator with this instance.
     *
     * @since [*next-version*]
     *
     * @param TranslatorInterface $translator
     *
     * @return $this This instance.
     */
    protected function _setTranslator(TranslatorInterface $translator)
    {
        $this->translator = $translator;

        return $this;
    }

    /**
     * Retrieves the translator associated with this instance.
     *
     * @since [*next-version*]
     *
     * @return TranslatorInterface|null The translator, if any.
     */
    protected function _getTranslator()
    {
        return $this->translator;
    }

    /**
     * Associates a translation subject with this instance.
     *
     * @since [*next-version*]
     *
     * @param mixed $subject
     *
     * @return $this This instance.
     */
    protected function _setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Retrieves the translation subject associated with this instance.
     *
     * @since [*next-version*]
     *
     * @return mixed|null The translation subject, if any.
     */
    protected function _getSubject()
    {
        return $this->subject;
    }
}
