<?php

namespace Dhii\I18n\Exception;

use ArrayAccess as Map;

/**
 * Common functionality for format translation exceptions.
 *
 * @since [*next-version*]
 */
abstract class AbstractFormatTranslationException extends AbstractStringTranslationException
{
    /**
     * The parameters used for interpolation.
     *
     * @since [*next-version*]
     *
     * @var Map
     */
    protected $interpolationParams;

    /**
     * Associates interpolation parameters with this instance.
     *
     * @since [*next-version*]
     *
     * @param array|Map $params The parameters.
     *
     * @return $this This instance.
     */
    protected function _setInterpolationParams($params)
    {
        $this->interpolationParams = $params;

        return $this;
    }

    /**
     * Retrieves the interpolation parameters used for translation.
     *
     * @since [*next-version*]
     *
     * @return array|Map|null The parameters, if any.
     */
    protected function _getInterpolationParams()
    {
        return $this->interpolationParams;
    }
}
