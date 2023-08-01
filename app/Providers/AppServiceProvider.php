<?php

namespace App\Providers;

use App\Http\Resources\Api\MissionResource;
use App\Models\Mission;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
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
                $this->sendGSM(title: 'تم اضافة مهمة جديدة', message: 'أيها النحلات الصفراء الأمورات, هناك مهمة جديدة يلا نعملهن كلن', topic: 'all', data: $missionResource);

                // Notification::create([
                //     'body'=> "تم إضافة " . $testament->item->name . " " . $testament->unit->name . ": " . $testament->quantity . " على ذمتك",
                //     'url'=> route('admin.dashboard.view'),
                //     'user_id'=>$testament->user_id
                // ]);
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
