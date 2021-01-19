<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show Hello-World.
     *
     * @return \Illuminate\Http\Response
     */
    public function helloWorld()
    {
        return view('home');
    }

    /**
     * Create a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveUser(Request $request)
    {
        $user = new User();
        $user->pseudo = $request->pseudo;
        $user->email = $request->email;
        $user->password = Hash::make($request->input('password'));
        $user->bio = $request->bio;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->zipcode = $request->zipcode;
        $user->city = $request->city;
        $user->country = $request->country;

        $user->save();
        return ($user);
    }

    /**
     * Check if user exist.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUser()
    {
        return User::all();
    }

    /**
     * Check if user exist.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserById(Request $request, $id)
    {
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function upUser(Request $request, $id,  User $user)
    {
        $user = new User();
        $user = User::find($id);

        $user->pseudo = $request->pseudo;
        $user->bio = $request->bio;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->zipcode = $request->zipcode;
        $user->country = $request->country;

        $user->save();
        return ($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteUser(Request $request, $id)
    {
        $user = User::destroy($id);

        return ($user);
    }
}
