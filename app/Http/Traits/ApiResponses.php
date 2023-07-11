<?php

namespace App\Http\Traits;

trait ApiResponses
{
    //////////////////////////////////////
    // generalResponse() can be used any time

    public function generalResponse($status, $code, $message = "", $errors = null, $data = null)
    {
        $data = is_null($data) ? [] : $data;
        $errors = is_null($errors) ? null : $errors;
        // return response()->json(['status' => $status, 'code' => $code, 'message' => $message, 'errors' => $errors, 'data' => $data], $code);
        return response()->json(['message' => $message, 'errors' => $errors, 'data' => $data, 'meta' => ['status' => $status]], $code);
    }

    //////////////////////////////////////
    // Success response & tiny Success response

    public function success($status = true, $code = 200, $message = "", $data = null, $additionalData = null, $links = null)
    {
        $data = is_null($data) ? [] : $data;
        $additionalData = is_null($additionalData) ? null : $additionalData;
        // return response()->json(['status' => $status, 'code' => $code, 'message' => $message, 'data' => $data, 'additionalData' => $additionalData], $code);
        return response()->json(['data' => $data, 'message' => $message, 'meta' => ['additionalData' => $additionalData, 'links' => $links]], $code);
    }
    public function tiny_success($status = true, $code = 200, $message = "")
    {
        // return response()->json(['status' => $status, 'code' => $code, 'message' => $message]);
        return response()->json(['message' => $message], $code);
    }



    public function success_list_response($code = 200, $message = "", $data = null, $meta=null, $links = null)
    {
        $data = is_null($data) ? [] : $data;
        $meta = is_null($meta) ? null : $meta;
        $links = is_null($links) ? null : $links;

        // return response()->json(['status' => $status, 'code' => $code, 'message' => $message, 'data' => $data, 'additionalData' => $additionalData], $code);
        return response()->json(['data' => $data, 'links' => $links, "meta"=> $meta,'message' => $message], $code);
    }


    public function tiny_success_t($code = 200, $message = "")
    {
        // return response()->json(['status' => $status, 'code' => $code, 'message' => $message]);
        return response()->json(['message' => $message], $code);
    }

    // اوبجكت واحد فقط
    public function success_single_response($code = 200, $message = "", $data = null, $meta=null)
    {
        $data = is_null($data) ? null : $data;
        $meta = is_null($meta) ? null : $meta;
        // return response()->json(['status' => $status, 'code' => $code, 'message' => $message, 'data' => $data, 'additionalData' => $additionalData], $code);
        return response()->json(['data' => $data, "meta"=> $meta,'message' => $message], $code);
    }



    //////////////////////////////////////
    // Fail response & tiny Fail response
    public function fail($status = false, $code = 404, $message = "", $errors = null, $data = null)
    {
        $data = is_null($data) ? [] : $data;
        // return response()->json(['status' => $status, 'code' => $code, 'message' => $message, 'errors' => $errors, 'data' => $data], $code);
        return response()->json(['message' => $message, 'errors' => $errors], $code);
    }
    public function tiny_fail($status = false, $code = 404, $message = "")
    {
        // return response()->json(['status' => $status, 'code' => $code, 'message' => $message]);
        return response()->json(['message' => $message], $code);
    }
}
