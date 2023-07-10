<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('id','DESC')->paginate(7);
        return view('dashboard.contact.index',compact('contacts'));
    }

    public function destroy(string $id)
    {
        Contact::find($id)->delete();
        return redirect()->route('dashboard.contact.index')
                        ->with('success','User deleted successfully');
    }
}
