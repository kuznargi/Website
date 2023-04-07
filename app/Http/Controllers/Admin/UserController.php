<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest as AdminUserRequest;
use App\Models\User;
use App\Models\Gender;
class UserController extends Controller
{
    public function index() {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }
   
    public function store(UserRequest $request )
    {
        $data = $request->validated();

        User::create($data);

        return redirect(route("users.index"));
    }
    public function update(UserRequest $request, User $review)
    {
        $review->update($request->all());

        return redirect(route('users.index'));
    }
    public function create()
    {$users = User::all();

        return view("admin.user.create", compact('users'));
    }
    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('users.index'));
    }
}
