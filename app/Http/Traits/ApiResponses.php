<?php

namespace App\Http\Traits;

trait ApiResponses
{

    //////////////////////////////////////
    // generalResponse() can be used any time

    public function generalResponse($status, $code, $message = "", $errors = null, $data = null)
    {
        $data = is_null($data) ? [] : $data;
        return response()->json(['status' => $status, 'code' => $code, 'message' => $message, 'errors' => $errors, 'data' => $data], $code);
    }

    //////////////////////////////////////
    // Success response & tiny Success response

    public function success($status = true, $code = 200, $message = "", $data = null, $additionalData = null)
    {
        $data = is_null($data) ? [] : $data;
        $additionalData = is_null($additionalData) ? [] : $additionalData;
        return response()->json(['status' => $status, 'code' => $code, 'message' => $message, 'data' => $data, 'additionalData' => $additionalData], $code);
    }
    public function tiny_success($status = true, $code = 200, $message = "")
    {
        return response()->json(['status' => $status, 'code' => $code, 'message' => $message]);
    }

    //////////////////////////////////////
    // Fail response & tiny Fail response
    public function fail($status = false, $code = 404, $message = "", $errors = null, $data = null)
    {
        $data = is_null($data) ? [] : $data;
        return response()->json(['status' => $status, 'code' => $code, 'message' => $message, 'errors' => $errors, 'data' => $data], $code);
    }
    public function tiny_fail($status = false, $code = 404, $message = "")
    {
        return response()->json(['status' => $status, 'code' => $code, 'message' => $message]);
    }

}
