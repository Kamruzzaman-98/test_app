<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();

        $user->name = $request->name;

        if ($request->hasFile('image')) {

            if ($user->image && File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/profile'), $filename);

            $user->image = 'uploads/profile/' . $filename;
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }
}
