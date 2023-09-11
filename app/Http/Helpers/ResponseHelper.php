<?php
function apiResponse($message, $data = null, $status = 200, $seo = null)
{
    $response = [
        'status' => $status,
        'data' => $data,
        'message' => $message,
        'url' => env('APP_URL') . '/',
        'seo' => $seo,
    ];
    return response()->json($response, $status);
}
