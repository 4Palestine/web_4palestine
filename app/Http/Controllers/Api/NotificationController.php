<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponses;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use ApiResponses;

    public function show_notifications() {
        $user = auth()->user();

        $notifications = $user->notifications;

        return $this->success_list_response(code: 200, message: "notifications returned successfully", data: $notifications, meta: null, links: null);
    }


    public function mark_notification_as_readed($id) {
        // $notification = Notification::where('user_id', auth()->user()->id)->where('id', $id)->first();

        $user = auth()->user();
        $notification = $user->notifications->find($id);
        if(!$notification){
            return $this->tiny_fail(status: false, code: 401, message: "you are not allowed to send this request");
        }

        $notification->update([
            'is_read' => 1,
        ]);

        return $this->tiny_success_t(code: 200, message: "notification has been marked as readed");
    }



    public function mark_all_notifications_as_readed() {
        $user = auth()->user();
        if($user->notifications->count() === 0){
            return $this->tiny_fail(status: false, code: 401, message: "you are not allowed to send this request");
        }

        $user->notifications()->update(['is_read' => 1]);

        // $notifications->update([
        //     'is_read' => 1,
        // ]);

        return $this->tiny_success_t(code: 200, message: "all notifications has been marked as readed");
    }
}
