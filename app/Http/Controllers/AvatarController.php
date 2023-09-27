<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,jpg',
        ]);

        $request->avatar->storeAs('avatars', "{$request->user()->id}.jpg", 'public');

        return redirect(route('profile.edit'));
    }
}
