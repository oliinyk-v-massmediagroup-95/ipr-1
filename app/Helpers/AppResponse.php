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

    public static function failed(array $data = [], int $status = 400): JsonResponse
    {
        $data['success'] = 0;

        return response()->json($data, $status);
    }
}
