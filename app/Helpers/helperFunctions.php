<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use NumberFormatter as NumberFormatter;
use Illuminate\Support\Optional;

// Steps To Make Helper File
//     * create app/helpers.php
//     * add this
//     "files": [
//         "app/helpers.php"
//     ]
//     inside the "autoload": {}  in composer.json
//     * run > composer dump-autoload
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
define('SUPPORT_AR', 'دعم');
define('SUPPORT_EN', 'support');

define('ATTACK_AR', 'نقد');
define('ATTACK_EN', 'attack');

//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
function transformDate($value, $format = 'Y-m-d')
{
    try {
        return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
    } catch (\ErrorException $e) {
        return \Carbon\Carbon::createFromFormat($format, $value);
    }
}
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
function format_money_custom($amount, $currency = null)
{
    $formatter = new NumberFormatter(config('app.locale'), NumberFormatter::CURRENCY);
    if ($currency === null) {
        $currency = config('app.currency', 'ils');
    }
    return $formatter->formatCurrency($amount, $currency);
}
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
function quickRandomString($length = 4)
{
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
}
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
// function productImagePath($image_name)
// {
//     return public_path('images/products/' . $image_name);
// }
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
// function model_path($model){
//     return "App\\Models\\$model";
// }
// function request_path($request){
//     return "App\\Http\\Requests\\$request";
// }
// function resource_path($resource){
//     return "App\\Http\\Resources\\$resource";
// }
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
function get_class_name($classPath)
{
    $classPath = get_class($classPath);
    $pathPartials = explode('\\', $classPath);
    return end($pathPartials);
}
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
if (!function_exists('optional')) {
    function optional($value = null, callable $callback = null)
    {
        if (is_null($callback)) {
            return new Optional($value);
        } elseif (!is_null($callback)) {
            return $callback($value);
        }
    }
}
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
if (!function_exists('image_url')) {
    function image_url($img, $custom_path = null)
    {
        if (isset($img))
            return (!empty($custom_path)) ? asset($custom_path . '/' . $img) : asset('storage/' . $img);

        return asset('storage/default_no-image-available-1.jpg');
    }
}

//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
if (!function_exists('db_transaction')) {
    function db_transaction(callable $callback)
    {
        try {
            DB::beginTransaction();
            $callback();
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
function sendGSM($title, $message, $topic, $data) {

    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = array(
        "to" => '/topics/' . $topic,
        'priority' => 'high',
        'content_available' => true,

        'notification' => array(
            "body" =>  $message,
            "title" =>  $title,
            "click_action" => "FLUTTER_NOTIFICATION_CLICK",
            "sound" => "default"

        ),
        'data' => $data
    );

    $headers = [
        'Authorization' => request()->header('Authorization'),
        'Content-Type' => 'application/json'
    ];

    $response = Http::withHeaders($headers)->post($url, $fields);

    if($response->successful()) {
        return $response->json();
    } else {
        return $response->body();
    }

    return $response;
}



//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
// trait uploadFile {
//     protected function uploadImage(
//         Request $request,
//         $old_image = null,
//         $filename = 'image',
//         $disk = 'public',
//         $path = '/'
//     ) {
//         if ($request->hasFile($filename)) {
//             if ($old_image) {
//                 Storage::disk($disk)->delete($old_image);
//             }
//             $file = $request->file($filename);

//             // $file->getClientOriginalName();
//             // $file->getSize();
//             // $file->getClientOriginalExtension();
//             // $file->getMimeType();

//             $path = $file->store($path, $disk);
//         } else {
//             $path = $old_image;
//         }
//         return $path;
//     }
// }
