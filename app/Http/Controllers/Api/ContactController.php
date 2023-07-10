<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('id' , 'desc')->paginate(5);
        if($contacts->count() > 0){
            $data = [
                'status' => 200 ,
                'message' => $contacts ,
            ];
            return response()->json($data , 200);
        } else {
            $data = [
                'status' => 404 ,
                'message' => "No Student Found" ,
            ];
            return response()->json($data , 404);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'user_id' => 'required',
            'message' => 'required',
        ]);
        if($validator->fails()){
            $data = [
                'status' => 422,
                'message' => $validator->messages(),
            ];
            return response()->json($data , 422);
        } else {
            $contacts = Contact::create([
                'user_id' => $request->get('user_id'),
                // 'user_id'=>auth()->user()->id;
                'message' => $request->get('message') ,
            ]);
            if($contacts) {
                $data = [
                    'status' => 200 ,
                    'message' => "Contact Created is done",
                ];
                return response()->json($data,200);
            } else {
                $data = [
                    'status' => 500 ,
                    'message' => "Something is wrong !!!",
                ];
                return response()->json($data,500);
            }
        }
    }
    public function destroy(string $id)
    {
        $contacts = Contact::findOrFail($id);
        if($contacts){
            $contacts->delete();
            $data = [
                'status' => 200,
                'message' => 'Contact Deleted is done',
            ];
            return response()->json($data , 200);
        } else {
            $data = [
                'status' => 404,
                'message' => 'Not Found !!',
            ];
            return response()->json($data , 404);
        }
    }
}
