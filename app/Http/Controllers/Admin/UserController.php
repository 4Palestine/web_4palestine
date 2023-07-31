<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\uploadFile;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use uploadFile;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::search(request()->query())->orderBy('id','DESC')->paginate(7);
        return view('dashboard.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('dashboard.user.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password|min:8',
            'is_active' => 'required|boolean',
            'is_super' => 'required|boolean',
            'country' => 'required|string',
            'languages' => 'required',
            'avatar' => 'image|max:1024|mimes:jpeg,png,jpg,gif'
        ]);



        $user = User::createUserWithVerification([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => $request->is_active,
            'is_super' => $request->is_super,
            'country' => $request->country,
            'languages' => json_encode($request->input('languages')),
            'avatar' => $this->uploadFile(request: $request, filename: 'avatar', path: 'uploads/users'),
            'admin_data' => json_encode(auth()->user()),
        ]);

        if(!$user) {
            return redirect()->route('dashboard.user.index')
            ->with('fail','Something went wrong !!');
        }

        // $verification = $user->createEmailVerification();
        // try {
        //     Mail::to($user->email)->send(new VerifyEmail($verification->code));
        //     return redirect()->route('dashboard.user.index')
        //     ->with('success','User created successfully');
        // } catch (\Exception $e) {
        //     return redirect()->route('dashboard.user.index')
        //     ->with('fail','Something went wrong !!');
        // }


        return redirect()->route('dashboard.user.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('dashboard.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('dashboard.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'is_active' => '',
            'is_super' => '',
            'country' => '',
            'languages' => '',
            'avatar' => 'image'
        ]);

        $user = User::find($id);



        if(!empty($request->password)){
            $password = Hash::make($request->password);
        }else{
            $password = $user->password;
        }

        $userUpdated = $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'is_active' => $request->is_active,
            'is_super' => $request->is_super,
            'country' => $request->country,
            'languages' => json_encode($request->input('languages')),
            'avatar' => $this->uploadFile(request: $request, old_image: $user->avatar, filename: 'avatar', path: 'uploads/users'),
            'admin_data' => json_encode(auth()->user()),
        ]);

        if(!$userUpdated) {
            return redirect()->route('dashboard.user.index')
            ->with('fail','Something went wrong !!');
        }
        return redirect()->route('dashboard.user.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('dashboard.user.index')
                        ->with('success','User deleted successfully');
    }
    public function trash()
    {
        $users = User::search(request()->query())->onlyTrashed()->paginate(5);
        return view('dashboard.user.trash' , compact('users'));
    }
    public function restore($id)
    {
        $users = User::onlyTrashed()->findOrFail($id);
        $users->restore();
        return redirect(route('dashboard.user.trash'))->with('success' , 'Users Restored is done');
    }

    public function forceDelete($id)
    {
        $users = User::onlyTrashed()->findOrFail($id);
        $users->forceDelete();
        return redirect(route('dashboard.user.trash'))->with('success' , 'Users Deleted is done');
    }

    // public function restore($id)
    // {
    //     $users = User::onlyTrashed()->paginate(5);
    //     $user = User::onlyTrashed()->findOrFail($id);
    //     $user->restore();
    //     return view('dashboard.user.trash' , compact('users'));
    // }
}
