<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($message, $result = null, $code = 200)
    {
        $response = [
            'code' => $code,
            'error' => false,
            'message' => $message,

        ];

        if(!empty($result)){
            $response['data'] = $result;
        }

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'code' => $code,
            'error' => true,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
