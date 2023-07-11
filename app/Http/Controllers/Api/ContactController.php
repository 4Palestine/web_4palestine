<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponses;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    use ApiResponses;
    // public function index()
    // {
    //     $contacts = Contact::orderBy('id' , 'desc')->paginate(5);
    //     if($contacts->count() > 0){
    //         $data = [
    //             'status' => 200 ,
    //             'message' => $contacts ,
    //         ];
    //         return response()->json($data , 200);
    //     } else {
    //         $data = [
    //             'status' => 404 ,
    //             'message' => "No Student Found" ,
    //         ];
    //         return response()->json($data , 404);
    //     }
    // }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->fail(status: false, code: 422, message: "", errors: $validator->messages(), data: null);
        }

        $contacts = Contact::create([
            // 'user_id' => $request->get('user_id'),
            'user_id' => auth('mobile')->user()->id,
            'message' => $request->get('message'),
        ]);
        if ($contacts) {
            return $this->tiny_success_t(code: 200, message: "Contact message sent successfully");
        } else {
            return $this->tiny_fail(status: false, code: 200, message: "Somthing went wrong");
        }
    }
    public function destroy(string $id)
    {
        $contacts = Contact::findOrFail($id);
        if ($contacts) {
            $contacts->delete();
            $data = [
                'status' => 200,
                'message' => 'Contact Deleted is done',
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'status' => 404,
                'message' => 'Not Found !!',
            ];
            return response()->json($data, 404);
        }
    }
}
