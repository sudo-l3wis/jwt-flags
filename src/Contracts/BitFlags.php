<?php

namespace JWTFlags\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BitFlags
{
    /**
     * Fetch a compiled list of bit flags for each relation.
     *
     * @param Model $model
     * @param Collection $relations
     * @return Collection
     */
    public function compileFlagsForModel(Model $model, Collection $relations): Collection;
}
