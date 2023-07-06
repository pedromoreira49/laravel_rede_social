<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $loggedInUser = Auth::user();
        
        if (!$loggedInUser) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        if ($user->id === $loggedInUser->id || $user->tokenCan('admin')) {
            $data = $request->validated();

            if (isset($data['password'])) {
                $data['password'] = bcrypt($data['password']);
            }

            $user->update($data);
            
            return response()->json($user);
        } else {
            return response()->json(['error' => 'You can only update your own user.'], 401);
        }
    }

    public function destroy(User $user)
    {
        $logUser = Auth::user();

        if (!$logUser) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if ($user->id === $logUser->id || $user->tokenCan('admin')) {
            $user->delete();
            return response()->json(['message' => 'User deleted successfully.'], 204);
        } else {
            return response()->json(['error' => 'You can only delete your own user.'], 401);
        }
    }
}