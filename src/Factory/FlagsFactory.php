<?php

namespace JWTFlags\Factory;

use Illuminate\Database\Eloquent\Model;
use JWTFlags\Contracts\Options;
use JWTFlags\Contracts\Relation;

class FlagsFactory
{
    /**
     * The strategy used to define the relation.
     *
     * @var Relation
     */
    protected Relation $relation;

    /**
     * FlagsFactory constructor.
     *
     * @param Relation $relation
     */
    public function __construct(Relation $relation)
    {
        $this->relation = $relation;
    }

    /**
     * Build flags for a model & relation.
     *
     * @param Model $model
     * @param Options $options
     * @return array
     */
    public function make(Model $model, Options $options): array
    {
        $relation = ($this->relation)($model, $options);

        return $relation->get('id')
            ->map(fn($v) => 1 << ($v->id - 1))
            ->reduce(fn($id, $bit) => $id | $bit, 0);
    }
}
