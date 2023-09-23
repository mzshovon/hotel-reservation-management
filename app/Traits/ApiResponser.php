<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

/*
|--------------------------------------------------------------------------
| Api Responser Trait
|--------------------------------------------------------------------------
|
| This trait will be used for any response we sent to customers.
|
*/

trait ApiResponser
{
    /**
     * Return a success JSON response.
     *
     * @param array|string $data
     * @param string|null $message
     * @param int $code
     * @return JsonResponse
     */
    protected function success($data, string $message = null, int $code = 200, $other = [])
    {
        return response()->json([
            'statusCode' => $code,
            'status' => 'success',
            'message' => $message,
        ] + $other + ['data' => $data ?? []]
        , $code);
    }

    /**
     * Return an error JSON response.
     *
     * @param string|null $message
     * @param string|array|null $trace
     * @param int $code
     * @param array|null $data
     * @return JsonResponse
     */
    protected function error(string $message = null, string | array $trace = null, int $code, ?array $data = [])
    {
        return response()->json([
            'status' => 'error',
            'statusCode' => $code,
            'message' => $message,
            'data' => $data
        ] + (strtolower(env('APP_ENV')) == 'test' ? ['trace' => $trace] : []), $code);
    }

    /**
     * Return an error JSON response.
     *
     * @param string $message
     * @param int $code
     * @param array|null $data
     * @return JsonResponse
     */
    protected function customError(string $message, int $code, ?array $data = []): JsonResponse
    {
        return response()->json([
                'status' => 'error',
                'statusCode' => $code,
                'message' => $message,
                'data' => $data
            ], $code);
    }
}
