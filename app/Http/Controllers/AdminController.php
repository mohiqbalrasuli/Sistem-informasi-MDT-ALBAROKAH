<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.data_admin', compact('user'));
    }
    public function create()
    {
        return view('admin.create_admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/data-admin')->with('swal_success', 'Admin berhasil ditambahkan');
    }
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.update_admin', compact('admin'));
    }
    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        return redirect('/data-admin')->with('swal_success', 'Admin berhasil diupdate!');
    }
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();
        return redirect()->back()->with('swal_success', 'Admin berhasil dihapus!');
    }
}
