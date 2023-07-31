<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Traits\uploadFile;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    use uploadFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::search(request()->query())->orderBy('id' , 'desc')->paginate(7);
        return view('dashboard.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin = new Admin();
        return view('dashboard.admin.create',compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|same:confirm-password|min:8',
            'is_active' => 'required|boolean',
            'role' => 'string',
            'avatar' => 'image|max:1024|mimes:jpeg,png,jpg,gif',
        ]);
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => $request->is_active,
            'role' => $request->role,
            'avatar' => $this->uploadFile(request: $request, filename: 'avatar', path: 'uploads/admins'),
            'admin_data' => json_encode(auth()->user()),
        ]);

        if(!$admin) {
            return redirect()->route('dashboard.admin.index')
            ->with('fail','Something went wrong !!');
        }

        return redirect()->route('dashboard.admin.index')
                        ->with('success','Admin created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = Admin::findOrFail($id);
        return view('dashboard.admin.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::find($id);
        return view('dashboard.admin.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$id,
            'password' => 'same:confirm-password',
            'is_active' => 'required|boolean',
            'role' => 'string',
            'avatar' => 'image|max:1024|mimes:jpeg,png,jpg,gif',
        ]);
        $admin = Admin::find($id);

        if(!empty($request->password)){
            $password = Hash::make($request->password);
        }else{
            $password = $admin->password;
        }

        $adminUpdated = $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $request->is_active,
            'password' => $password,
            'role' => $request->role,
            'avatar' => $this->uploadFile(request: $request, old_image: $admin->avatar, filename: 'avatar', path: 'uploads/admins'),
            'admin_data' => json_encode(auth()->user()),
        ]);

        if(!$adminUpdated) {
            return redirect()->route('dashboard.admin.index')
            ->with('fail','Something went wrong !!');
        }
        return redirect()->route('dashboard.admin.index')
                        ->with('success','Admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Admin::find($id)->delete();
        return redirect()->route('dashboard.admin.index')
                        ->with('success','Admin deleted successfully');
    }
}
