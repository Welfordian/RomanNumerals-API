<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiErrorController extends Controller
{
    public function invalidRequest()
    {
        return response([
            "error" => [
                "status" => "invalid-request",
                "message" => "This API endpoint accepts only numerical values"
            ]
        ], 400);
    }

    public function invalidValue()
    {
        return response([
            'error' => [
                'status' => 'invalid-value',
                'message' => 'Integer to convert must be between 1 & 3999'
            ]
        ], 400);
    }

    public function invalidEndpoint()
    {
        return response([
            "error" => [
                "status" => "invalid-endpoint",
                "message" => "No valid API endpoint exists at this location"
            ]
        ], 400);
    }
}
