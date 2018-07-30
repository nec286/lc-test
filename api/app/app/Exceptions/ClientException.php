<?php

namespace App\Exceptions;

use Exception;
use App\Http\Resources\Error as ErrorResource;

class ClientException extends Exception
{
    private $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function report() { }

    public function render($request)
    {
        return response()->json(new ErrorResource($this->response),
            $this->response['status']);
    }
}
