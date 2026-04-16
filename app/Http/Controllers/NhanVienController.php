<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;

class NhanVienController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $nhanviens = NhanVien::when($search, function ($query) use ($search) {
        return $query->where('ten', 'like', "%$search%")
                     ->orWhere('email', 'like', "%$search%")
                     ->orWhere('sdt', 'like', "%$search%");
    })->get();

    return view('nhanvien.index', compact('nhanviens'));
}


    public function create()
    {
        return view('nhanvien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|email|unique:nhan_viens,email',
            'sdt' => 'required|string|max:15',
            'chuc_vu' => 'required|string|max:255'
        ]);

        NhanVien::create([
            'ten' => $request->ten,
            'email' => $request->email,
            'sdt' => $request->sdt,
            'chuc_vu' => $request->chuc_vu
        ]);

        return redirect('/nhanvien')->with('success', 'Thêm nhân viên thành công!');
    }

    public function edit($id)
    {
        $nv = NhanVien::find($id);
        return view('nhanvien.edit', compact('nv'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|email|unique:nhan_viens,email,' . $id,
            'sdt' => 'required|string|max:15',
            'chuc_vu' => 'required|string|max:255'
        ]);

        $nv = NhanVien::find($id);

        $nv->update([
            'ten' => $request->ten,
            'email' => $request->email,
            'sdt' => $request->sdt,
            'chuc_vu' => $request->chuc_vu
        ]);

        return redirect('/nhanvien')->with('success', 'Cập nhật nhân viên thành công!');
    }

    public function destroy($id)
    {
        NhanVien::destroy($id);
        return redirect('/nhanvien')->with('success', 'Xóa nhân viên thành công!');
    }
}
