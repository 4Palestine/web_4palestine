<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Response::macro('success', function ($status, $message, $data = [], $additional = []) {
        //     $response = ['status' => $status, 'message' => $message, 'data' => $data];
        //     $this->send_response($additional, $response);
        // });

        // Response::macro('error', function ($status = 400, $message, $additional = []) {
        //     $response = ['status' => $status, 'message' => $message];
        //     $this->send_response($additional, $response);
        // });
    }

    // public function send_response($additional, $response)
    // {
    //     if (isset($additional))
    //         $response = array_merge($response, ['additional' => $additional]);
    //     return Response::json($response, ['Content-Type' => 'application/json']);
    // }
}
