<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socials = Setting::where('group' , '=' , 'SOCIAL_MEDIA')->get();
        $modes = Setting::where('group' , '=' , 'MODE')->get();
        $faqs = Setting::where('group', '=', 'FAQ')->first();

        return view('dashboard.setting.index' , compact('socials' , 'modes', 'faqs'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $facebook = $request->facebook ?? null;
        $instagram = $request->instagram ?? null;
        $twitter = $request->twitter ?? null;

        $data = [];
        if(isset($facebook)) {
            $data['facebook'] = $facebook;
        }
        if(isset($instagram)) {
            $data['instagram'] = $instagram;
        }
        if(isset($twitter)) {
            $data['twitter'] = $twitter;
        }

        foreach($data as $key => $value) {
            Setting::where('key', $key)->first()->update([
                'value' => $value
            ]);
        }

        //////////////////////////////////////
        if(isset($request->faq)) {
            Setting::updateOrCreate(['group' => 'FAQ'], [
                'data' => json_encode($request->faq),
            ]);
        }


        return redirect()->route('dashboard.setting.index')->with('success', 'Settings Updated Successfully');
    }
}
