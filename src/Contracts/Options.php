<?php

namespace JWTFlags\Contracts;

interface Options
{
    /**
     * Get related property.
     *
     * @return string
     */
    public function related(): string;

    /**
     * Get pivot property.
     *
     * @return string
     */
    public function pivot(): string;
}
