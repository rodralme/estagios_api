<?php namespace App\Helpers;

class Responder
{
    public static function success($data = [], string $message = '', $meta = [])
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message,
            'meta' => $meta,
        ]);
    }

    public static function error($data = [], string $error = '', $responseCode = 400)
    {
        return response()->json([
            'success' => false,
            'error' => $error,
            'data' => $data,
        ], $responseCode);
    }
}
