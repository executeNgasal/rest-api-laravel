<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller
{
      /**
      * Success response method.
      */
      public function sendResponse($result, string $message)
      {
         $response = [
               'success' => true,
               'data' => $result,
               'message' => $message,
         ];
   
         return response()->json($response, 200);
      }
   
      /**
      * Error response method.
      */
      public function sendError(string $error, array $errorMessages = [], int $code = 404)
      {
         $response = [
               'success' => false,
               'message' => $error,
         ];
   
         if (!empty($errorMessages)) {
               $response['data'] = $errorMessages;
         }
   
         return response()->json($response, $code);
      }
}
