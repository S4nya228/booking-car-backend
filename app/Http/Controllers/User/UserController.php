<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Http\Resources\User\UserResource;

class UserController extends Controller
{
    public function showUserProfile(User $user)
    {
        return UserResource::make($user);
    }

    public function showCurrentUser(Request $request)
    {
        return UserResource::make($request->user());
    }

    public function updateUserProfile(UserRequest $request)
    {
        $validated = $request->validated();

        $request->user()->update($validated);

        $user = User::find($request->user()->id);

        return UserResource::make($user);
    }

}
