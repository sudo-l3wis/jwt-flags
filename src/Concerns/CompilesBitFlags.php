<?php

namespace JWTFlags\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JWTFlags\Factory\FlagsFactory;

trait CompilesBitFlags
{
    /**
     * Fetch a compiled list of bit flags for each given relation.
     *
     * @param Model $model
     * @param Collection $relations
     * @return Collection
     */
    public function compileFlagsForModel(Model $model, Collection $relations): Collection
    {
        /** @var FlagsFactory $factory */
        $factory = app(FlagsFactory::class);

        $bits = $relations->map(function ($name, $value) use ($model, $factory) {
            $type = config('jwt-flags.options');
            $options = new $type($value);
            $flags = $factory->make($model, $options);

            return [$name => $flags];
        });

        return $bits->flatten();
    }
}
