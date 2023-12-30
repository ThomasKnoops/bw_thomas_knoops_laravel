<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowController extends Controller
{
    public function followUser(User $user)
    {
        auth()->user()->following()->attach($user->id);

        return redirect()->back()->with('status', 'You are now following ' . $user->name);
    }

    public function unfollowUser(User $user)
    {
        auth()->user()->following()->detach($user->id);

        return redirect()->back()->with('status', 'You are no longer following ' . $user->name);
    }
}
