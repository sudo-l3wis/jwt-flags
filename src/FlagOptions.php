<?php

namespace JWTFlags;

use JWTFlags\Contracts\Options;
use JWTFlags\Exception\MissingAttributeException;
use Throwable;

class FlagOptions implements Options
{
    /**
     * Flag options fields.
     *
     * @var array
     */
    protected array $options;

    /**
     * FlagOptions constructor.
     *
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->options = $options;
    }

    /**
     * Get related property.
     *
     * @return string
     * @throws Throwable
     */
    public function related(): string
    {
        // This value defines the model class that's associated with the primary
        // model. This model is used to find ids across a pivot.
        $related = $this->options['related'] ?? null;

        throw_unless($related, MissingAttributeException::class);

        return $related;
    }

    /**
     * Get pivot property.
     *
     * @return string
     * @throws Throwable
     */
    public function pivot(): string
    {
        // This value defines pivot for both models.
        $pivot = $this->options['pivot'] ?? null;

        throw_unless($pivot, MissingAttributeException::class);

        return $pivot;
    }
}
