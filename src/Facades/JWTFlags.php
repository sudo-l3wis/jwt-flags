<?php

namespace JWTFlags\Facade;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Collection from(Model $model)
 * @method static Collection has(string $flag, int $id): bool
 *
 * @see \JWTFlags\Flags
 */
class JWTFlags extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'jwt.flags';
    }
}
