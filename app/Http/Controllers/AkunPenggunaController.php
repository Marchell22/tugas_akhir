<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AkunPenggunaController extends Controller
{
    public function AkunPengguna()
    {
        $data = User::get();
        return view('admin.AkunPengguna', compact('data'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;

        User::create($data);
        return redirect()->route('admin.AkunPengguna');
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable',
            'role' => 'required|in:admin,user'  // Ensure role values are valid
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Find the user by ID
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.AkunPengguna')->with('error', 'User not found.');
        }

        // Update user details
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Save changes to the database
        $user->save();

        return redirect()->route('admin.AkunPengguna')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.AkunPengguna')->with('error', 'User not found');
        }

        $user->delete();

        return redirect()->route('admin.AkunPengguna')->with('success', 'User deleted successfully');
    }
}
