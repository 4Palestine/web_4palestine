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
        Response::macro('success', function ($status = 200, $message = 'success', $data = [], $additional = null) {
            $response = ['status' => $status, 'message' => $message, 'data' => $data];
            if (isset($additional))
                $response = array_merge($response, ['additional' => $additional]);
            return Response::json($response);
        });

        Response::macro('error', function ($status = 400, $message, $additional = null) {
            $response = ['status' => $status, 'message' => $message];
            if (isset($additional))
                $response = array_merge($response, ['additional' => $additional]);
            return Response::json($response);
        });
    }
}
