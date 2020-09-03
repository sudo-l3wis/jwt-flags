<?php

namespace JWTFlags;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JWTFlags\Concerns\CompilesBitFlags;
use JWTFlags\Contracts\BitFlags;
use Tymon\JWTAuth\Facades\JWTAuth;

class Flags implements BitFlags
{
    /**
     * @trait CompilesBitFlags
     */
    use CompilesBitFlags;

    /**
     * Compile a collection of flags for the given model.
     *
     * @param Model $model
     * @return Collection
     */
    public function from(Model $model): Collection
    {
        return $this->compileFlagsForModel($model, $this->flags());
    }

    /**
     * Determine if the token payload contains the given flag.
     *
     * @param string $flag
     * @param int $id
     * @return bool
     */
    public function has(string $flag, int $id): bool
    {
        $claims = $this->claims();

        if ($value = $claims[$flag] ?? false) {
            return $value & $id;
        }

        return false;
    }

    /**
     * Get flags.
     *
     * @return Collection
     */
    protected function flags()
    {
        return collect(config('jwt-flags.flags'));
    }

    /**
     * Get token claims.
     *
     * @return array
     */
    protected function claims()
    {
        return JWTAuth::getPayload()->toArray();
    }
}
