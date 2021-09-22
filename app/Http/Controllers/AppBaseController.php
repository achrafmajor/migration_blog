<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return response()->json(['error' => false, 'data' => $result, 'message' => $message]);
    }
    public function sendError($error, $code = 404)
    {
        return  response()->json(['error' => true, 'message' => $error], $code);
    }
}
