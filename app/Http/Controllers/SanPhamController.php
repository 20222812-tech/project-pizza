<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;

class SanPhamController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $sanphams = SanPham::when($search, function ($query) use ($search) {
            return $query->where('ten', 'like', "%$search%");
        })->get();

        return view('sanpham.index', compact('sanphams', 'search'));
    }

    public function create()
    {
        return view('sanpham.create');
    }

    public function store(Request $request)
    {
        $filename = null;

        // ✅ UPLOAD ẢNH
        if ($request->hasFile('hinh')) {
            $file = $request->file('hinh');

            // tạo tên file
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // lưu vào public/uploads
            $file->move(public_path('uploads'), $filename);
        }

        // ✅ LƯU DATABASE
        SanPham::create([
            'ten' => $request->ten,
            'gia' => $request->gia,
            'size' => $request->size,
            'so_luong' => $request->so_luong,
            'mo_ta' => $request->mo_ta,
            'hinh' => $filename
        ]);

        return redirect('/sanpham')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function edit($id)
    {
        $sp = SanPham::find($id);
        return view('sanpham.edit', compact('sp'));
    }

    public function update(Request $request, $id)
    {
        $sp = SanPham::find($id);

        $filename = $sp->hinh;

        // ✅ nếu có ảnh mới
        if ($request->hasFile('hinh')) {
            $file = $request->file('hinh');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads'), $filename);
        }

        // ✅ update dữ liệu
        $sp->update([
            'ten' => $request->ten,
            'gia' => $request->gia,
            'size' => $request->size,
            'so_luong' => $request->so_luong,
            'mo_ta' => $request->mo_ta,
            'hinh' => $filename
        ]);

        return redirect('/sanpham')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        SanPham::destroy($id);
        return redirect('/sanpham')->with('success', 'Xóa thành công!');
    }
}
