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
        $faqs_array = Setting::where('group', '=', 'FAQ')->first();
        $faqs = isset($faqs_array) ? json_decode($faqs_array->data) : null;

        return view('dashboard.setting.index' , compact('socials' , 'modes', 'faqs'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());

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
        $data = [
            'questions' => $request->input('questions'),
            'answers' => $request->input('answers')
        ];
        $jsonData = json_encode($data);

        if(isset($data['questions'], $data['answers'])) {
            Setting::updateOrCreate(['group' => 'FAQ'], [
                'data' => $jsonData,
            ]);
        } else {
            Setting::where('group', '=', 'FAQ')->first()->update([
                'data' => NULL,
            ]);
        }


        return redirect()->route('dashboard.setting.index')->with('success', 'Settings Updated Successfully');
    }
}
