<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            // khaled edits
            // return redirect()->intended(RouteServiceProvider::HOME);
            return redirect()->intended('/api/user');
        }

        $request->user()->sendEmailVerificationNotification();
        return $this->tiny_success_t(code: 200, message: __('messages.otp_code_success'));

    }
}
