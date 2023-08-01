<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base5Controller;
use App\Http\Traits\ApiResponses;
use App\Models\Setting;

class SettingController extends Controller
{
    use ApiResponses;

    public function list_of_faqs()
    {
        $faqs = json_decode(Setting::where('group', '=', 'FAQ')->first()->data) ?? [];

        return $this->success_single_response(code: 200, message: __('messages.faqs_returned'), data:  $faqs, meta: null);

    }
}
