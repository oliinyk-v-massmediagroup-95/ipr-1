<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class AppResponse
{
    public static function success(array $data = [], int $status = 200): JsonResponse
    {
        $data['success'] = 1;

        return response()->json($data, $status);
    }

    public static function failed(string $message, int $status = 400): JsonResponse
    {
        return response()->json([
            'success' => 0,
            'message' => $message,
        ], $status);
    }

    public static function validation(array $fieldErrors)
    {
        return response()->json([
            'errors' => $fieldErrors,
            'success' => 0,
        ], 422);
    }
}
