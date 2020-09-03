<?php

namespace JWTFlags\Http\Middleware;

use JWTFlags\Facade\JWTFlags;
use Closure;
use Illuminate\Http\Request;
use JWTFlags\Exceptions\MissingFlagException;
use Throwable;

class HasFlag
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string $flag
     * @param string $name
     * @return mixed
     * @throws Throwable
     */
    public function handle($request, Closure $next, string $flag, string $name)
    {
        $id = $request->route($name);

        $id = is_null($id) ? $request->input($name) : $id;

        throw_unless(JWTFlags::has($flag, $id), MissingFlagException::class, $flag, $id);

        return $next($request);
    }
}
