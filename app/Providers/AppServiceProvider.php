<?php

namespace App\Providers;

use App\Http\Resources\Api\MissionResource;
use App\Models\Mission;
use App\Models\User;
use App\Notifications\NewMissionNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
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
        Mission::created(function ($mission) {
            DB::transaction(function () use ($mission) {
                $missionResource = new MissionResource($mission);

                $title = 'New Mission Has Been Added 🚀';
                $message ='check the new mission and gain stars ⭐🤩';
                $this->sendGSM(title: $title, message: $message, topic: 'all', data: $missionResource);


                $users = User::get(['id']);

                $data = [
                    'title' => $title,
                    'message' => $message,
                    'data' => $missionResource
                ];

                Notification::send($users, new NewMissionNotification($data));

                //  the old way to send for each single user alone
                // foreach($users as $user){
                //     $user->notify(new NewMissionNotification($data, $user->id));
                // }
            });
        });
    }

    public function sendGSM($title, $message, $topic, $data) {

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
            'Authorization' => config('app.firebase_notification_key'),
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

}
