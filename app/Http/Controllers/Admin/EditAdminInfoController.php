<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EditAdminInfoController extends Controller
{
    public function index()
    {
        return view('admin.settings')->with('user', Auth::user());
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        // or
        // $user = User::find(Auth::id());
        // or : 
        // $user = Auth::user();


        $picture_link = $user->picture;
        if ($request->hasFile('user_picture')) {
            // Deleting Old Image Then Replacing it with the new one:
            Storage::disk('public')->delete($user->picture);
            // Getting the file uploaded:
            $user_picture = $request->file('user_picture');
            $path = 'uploads/images/admin/';
            $picture_link =  $user_picture->store($path, ['disk' => 'public']);
        }

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
        $user->save();
        return redirect()->back()->with(['success' => 'User Updated Successfully', 'type' => 'success']);
    }
}
