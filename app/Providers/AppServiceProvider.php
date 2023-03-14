<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Response::macro('success', function ($status = 200, $message = 'success', $data = [], $additional = []) {
            $response = ['status' => $status, 'message' => $message, 'data' => $data];
            if (isset($additional))
                $response = array_merge($response, ['additional' => $additional]);

            // $this->send_response($additional, $response);
            return Response::json($response);
        });

        Response::macro('error', function ($status = 400, $message) {
            $response = ['status' => $status, 'message' => $message];
            return Response::json($response);
        });
    }
    public function send_response($additional, $response)
    {
        if (isset($additional))
            $response = array_merge($response, ['additional' => $additional]);
        return Response::json($response, ['Content-Type' => 'application/json']);
    }
}
