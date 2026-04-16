<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;

class KhachHangController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $khachhang = KhachHang::when($search, function ($query) use ($search) {
            return $query->where('ten', 'like', "%$search%")
                        ->orWhere('sdt', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%");
        })->orderByDesc('tong_chi_tieu')->get();

        return view('khachhang.index', compact('khachhang', 'search'));
    }

    public function create()
    {
        return view('khachhang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required',
            'sdt' => 'required|unique:khach_hangs',
            'email' => 'nullable|email',
            'dia_chi' => 'nullable'
        ]);

        KhachHang::create($request->all());
        return redirect('/khachhang')->with('success', 'Thêm khách hàng thành công');
    }

    public function edit($id)
    {
        $kh = KhachHang::find($id);
        return view('khachhang.edit', compact('kh'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ten' => 'required',
            'sdt' => 'required',
            'email' => 'nullable|email',
            'dia_chi' => 'nullable'
        ]);

        $kh = KhachHang::find($id);
        $kh->update($request->all());
        return redirect('/khachhang')->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        KhachHang::destroy($id);
        return redirect('/khachhang')->with('success', 'Xóa thành công');
    }
}

