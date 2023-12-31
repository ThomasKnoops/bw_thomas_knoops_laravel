<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    // View users page
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    // Edit user profile
    public function editProfile()
    {
        $user = auth()->user();
        return view('user.editProfile', compact('user'));
    }

    // Update user profile
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'birthday' => 'required|date',
            'bio' => 'required|string|max:500',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'birthday' => $request->input('birthday'),
            'bio' => $request->input('bio'),
        ]);

        if ($request->hasFile('avatar')) {
            if ($user->profile_photo_path !== 'images/avatars/default.png') {
                Storage::delete(str_replace('storage/', 'public/', $user->profile_photo_path));
            }

            $avatarPath = $request->file('avatar')->store('public/images/avatars');
            $user->update(['profile_photo_path' => str_replace('public/', 'storage/', $avatarPath)]);
        }

        return redirect()->route('user.index')->with('status', 'Profile updated successfully!');
    }

    // Admin make user admin
    public function makeAdmin(User $user)
    {
        $user->update(['is_admin' => true]);
        return redirect()->route('user.index')->with('status', 'User made admin successfully!');
    }

}
