<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class EditAdminInfoController extends Controller
{
    public function index()
    {
        return view('admin.settings')->with('user', Auth::user());
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        return redirect()->back();
    }
}
