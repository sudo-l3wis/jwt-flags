<?php

namespace JWTFlags\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MissingFlagException extends Exception
{
    /**
     * The name of the flag.
     *
     * @var string
     */
    protected string $flag;

    /**
     * The id associated with the flag.
     *
     * @var int
     */
    protected int $id;

    /**
     * MissingFlagException constructor.
     *
     * @param string $flag
     * @param int $id
     */
    public function __construct(string $flag, int $id)
    {
        parent::__construct();

        $this->flag = $flag;
        $this->id = $id;
    }

    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param Request  $request
     * @return Response
     */
    public function render($request)
    {
        return response(__('jwt-flags::exceptions.denied', $this->fields()), 403);
    }

    /**
     * Get the translation fields.
     *
     * @return array
     */
    protected function fields()
    {
        return [
            'flag' => $this->flag,
            'id' => $this->id,
        ];
    }
}
