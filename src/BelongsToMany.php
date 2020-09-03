<?php

namespace JWTFlags;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany as IlluminateBelongsToMany;
use JWTFlags\Contracts\Options;
use JWTFlags\Contracts\Relation;
use Throwable;

class BelongsToMany implements Relation
{
    /**
     * Build a "BelongsToMany" relation.
     *
     * @param Model $model
     * @param Options $options
     * @return IlluminateBelongsToMany
     * @throws Throwable
     */
    public function __invoke(Model $model, Options $options): IlluminateBelongsToMany
    {
        return $model->belongsToMany($options->related(), $options->pivot());
    }
}
