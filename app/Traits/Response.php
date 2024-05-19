<?php

namespace App\Traits;

trait Response
{
    public function ok(string $message, mixed $data = null, int $statusCode = 200)
    {
        return response()->json(
            [
                'success' => true,
                'message' => __($message),
                'data' => $data
            ],
            $statusCode
        );
    }

    public function fail(string $message, int $statusCode = 400, $data = null)
    {
        return response()->json(
            [
                'success' => false,
                'message' => __($message),
                'data' => $data
            ],
            $statusCode
        );
    }

}
