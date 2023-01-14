<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\FileProcessingTrait;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\EditUserRequest;

class EditAdminInfoController extends Controller
{

    use FileProcessingTrait;

    public function index()
    {
        return view('admin.edit')->with('user', Auth::user());
    }

    public function update(EditUserRequest $request)
    {
        $user = User::find(Auth::user()->id);
        // or
        // $user = User::find(Auth::id());
        // or : 
        // $user = Auth::user();


        $picture_link = $this->update_file($request, $user->picture, 'user_picture', 'uploads/images/admin/');

        $name = $request->input('name');
        $email = $request->input('email');
        $address = $request->input('address');
        $about_me = $request->input('about_me');

        $user->name = $name;
        $user->email = $email;
        $user->address = $address;
        $user->description = $about_me;
        $user->picture = $picture_link;
        // Updating User Info:
        $status = $user->update();
        return redirect()->back()->with([$status ? 'success' : 'fail' => $status ? 'User Updated Successfully' : 'Something is wrong!', 'type' => $status ? 'success' : 'error']);
    }
}
