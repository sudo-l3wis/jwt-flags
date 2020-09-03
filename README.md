# jwt-flags

This package is an extension to the tymondesigns/jwt-auth package. It's
intention is to provide a simple implementation for binding flags within the
token payload.

## Middleware
This middleware can be used to restrict access to users with a particular flag.
This accepts the name of the flag and the name of the parameter to use from the
request. If the field cannot be resolved from the route e.g. /foo/{id} then it
will be resolved from the request body.
```
$this->middleware('jwt.flags:roles,id');
```

## Facade:
Use the `JWTFlags` facade to build flag claims for the authenticated user or check
if the user has a particular flag within the claims of their token.
```
JWTFlags::from($user);
JWTFlags::has('roles', $role->id);
```

## Claims:
Add the flag fields to the user token claims.
```
/**
 * Get custom JWT token claims.
 *
 * @return array
 */
public function getJWTCustomClaims()
{
   return JWTFlags::from($this);
}
```

## References:
[https://github.com/tymondesigns/jwt-auth]()
