<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RoleController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('roles.index', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect()->back()->with('success', 'Role Berhasil Diubah');
    }
}
