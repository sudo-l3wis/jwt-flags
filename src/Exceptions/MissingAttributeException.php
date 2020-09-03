<?php

namespace JWTFlags\Exception;

use Exception;

class MissingAttributeException extends Exception
{
    /**
     * MissingAttributeException constructor.
     *
     * This exception is raised in the event that a property in flag options is
     * missing for a given set of claims.
     *
     * @param string $attribute
     * @param string $name
     */
    public function __construct(string $attribute, string $name)
    {
        parent::__construct("Missing '{$attribute}' property in flags for '{$name}'");
    }
}
