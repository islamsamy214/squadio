<?php

use Illuminate\Support\Facades\Validator;

function apiValidateRequest($request, $rules, $messages = null)
{
    if ($messages) {
        $validator = Validator::make($request, $rules, $messages);
    } else {
        $validator = Validator::make($request, $rules);
    }
    if ($validator->fails()) {
        return response()->json([
            'status' => 'fail',
            'data' => $validator->errors(),
        ], 422);
    } else {
        return false;
    }
}
