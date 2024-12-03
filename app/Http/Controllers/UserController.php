<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //view
    public function index()
    {
        $users = User::all();
        return view('user', compact('users'));
    }

    //add
    public function create()
    {
        return view('user-add');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255|unique:users,email',
            'role' => 'required|string|max:50',
            'password' => 'required|string',
        ]);
    
        User::create([
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);
    
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }    

    //edit
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user-edit', compact('user'));
    }

    //update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string|max:50',
            'password' => 'nullable|string',
        ]);
    
        $user = User::findOrFail($id);
    
        $data = [
            'email' => $request->email,
            'role' => $request->role,
        ];
    
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
    
        $user->update($data);
    
        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }    

    //delete
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}
