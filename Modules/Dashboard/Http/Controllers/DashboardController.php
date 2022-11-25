<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Dashboard\Http\Requests\UserRequest;
use Modules\Product\Models\Product;
use Modules\User\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('dashboard::index',[
            'products' => count(Product::all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dashboard::create');
    }

    /**
     * Show the form for editing the specified resource.
     * @param User $user
     * @return Renderable
     */
    public function edit(User $user)
    {
        return view('dashboard::edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param UserRequest $request
     * @param User $user
     * @return Renderable
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return to_route('profile.index')->with('success', '');
    }

    /**
     * Display profile page
     * @return Renderable
     */
    public function profile()
    {
        return view('dashboard::profile', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Display change password page
     *
     * @return Renderable
     */
    public function view()
    {
        return view('dashboard::password');
    }


    public function changePassword(ChangePasswordRequest $request)
    {
        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->old_password, $hashedPassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->new_password);
            $users->save();

            return to_route('dashboard')->with('change-password', '');
        }
            return back()->with('passwordDoesNotMatched', '');
    }

    public function calendar()
    {
        return view('dashboard::calendar');
    }
}
