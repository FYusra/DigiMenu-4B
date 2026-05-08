<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);

        User::create($request->only(['nama', 'email', 'password', 'role']));
        return redirect()->back()->with('success_message', 'User berhasil ditambahkan.');
    }

    public function update(Request $request, $id_user)
    {
        $rules = [
            'nama'=>'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required'
        ];

        $request->validate($rules);
        $user = User::findOrFail($id_user);
        $array = $request->only(['nama', 'email', 'role', 'password']);

        if ($request->filled('password')){
            $array['password'] = $request->password;
        }
        $user->update($array);

        return redirect()->back()->with('success_message', "User {$user->nama} berhasil diupate.");
    }

    public function destroy($id_user){
        $user = User::findOrFail($id_user);
        $user->delete();

        return redirect()->back()->with('success_message', "User {$user->nama} berhasil dihapus.");
    }

    public function showChangePassword(Request $request){
        return view('users.change-pass');
    }

    public function saveChangePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = auth()->user();
        if (! Hash::check($request->input('old_password'), $user->password)) {
            return back()->withErrors(['old_password' => 'The current password is incorrect.']);
        }

        // Update the user's password
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('user.changePassword')->with('success', 'Password changed successfully.');
    }
}