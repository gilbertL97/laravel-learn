<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class RecordNotFoundException extends Exception
{
    // protected $message = 'Record not found';
    // protected $code = 404;
    public function __construct($message = "Record not found", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render(Request $request): JsonResponse
    {
        return response()->json([
            'error' => 'Not Found',
            'message' => $this->getMessage(),
        ], 404);
    }
}
