<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Flag Relation Strategy
    |--------------------------------------------------------------------------
    |
    | This value is used to define the strategy that builds the relation.
    |
    */

    'relation' => \JWTFlags\BelongsToMany::class,

    /*
    |--------------------------------------------------------------------------
    | Flag Options
    |--------------------------------------------------------------------------
    |
    | This value is used to define the options class.
    |
    */

    'options' => \JWTFlags\FlagOptions::class,

    /*
    |--------------------------------------------------------------------------
    | Token Payload Flags
    |--------------------------------------------------------------------------
    |
    | This value is the list of flags to build and embed within the token
    | payload. This consists of a name and the respective relation with which to
    | fetch ids. The ids are adjusted to exponents that represent bits within
    | an integer.
    |
    */

    'flags' => [

//        'roles' => [

//            'model' => Role::class,
//            'pivot' => 'users_roles'

//        ],

    ],

];
