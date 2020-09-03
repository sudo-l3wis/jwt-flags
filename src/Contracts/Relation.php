<?php

namespace JWTFlags\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation as IlluminateRelation;

interface Relation
{
    /**
     * Build an Illuminate relation from the given model & options.
     *
     * @param Model $model
     * @param Options $options
     * @return IlluminateRelation
     */
    public function __invoke(Model $model, Options $options): IlluminateRelation;
}
