<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', "%$search%")
                         ->orWhere('email', 'like', "%$search%");
        })->orderBy('name')->get();

        return view('users.index', compact('users', 'search'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = ['admin' => 'Quản trị viên', 'manager' => 'Quản lý', 'staff' => 'Nhân viên', 'warehouse' => 'Kho'];
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:admin,manager,staff,warehouse'
        ]);

        $user = User::find($id);
        $user->update(['role' => $request->role]);

        return redirect('/users')->with('success', 'Cập nhật quyền thành công');
    }

    public function destroy($id)
    {
        if ($id == auth()->user()->id) {
            return redirect('/users')->with('error', 'Không thể xóa chính mình');
        }

        User::destroy($id);
        return redirect('/users')->with('success', 'Xóa người dùng thành công');
    }
}

