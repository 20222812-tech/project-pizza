<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $sanphams = SanPham::when($keyword, function ($query) use ($keyword) {
            return $query->where('ten', 'like', "%$keyword%");
        })->get();

        return view('sanpham.index', compact('sanphams', 'keyword'));
    }

    public function create()
    {
        return view('sanpham.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('hinh')) {
            $file = $request->file('hinh');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['hinh'] = $filename;
        }

        SanPham::create($data);

        return redirect('/sanpham')->with('success', 'Thêm thành công!');
    }

    public function edit($id)
    {
        $sp = SanPham::find($id);
        return view('sanpham.edit', compact('sp'));
    }

    public function update(Request $request, $id)
    {
        $sp = SanPham::find($id);
        $data = $request->all();

        if ($request->hasFile('hinh')) {
            $file = $request->file('hinh');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['hinh'] = $filename;
        }

        $sp->update($data);

        return redirect('/sanpham')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        SanPham::destroy($id);
        return redirect('/sanpham')->with('success', 'Xóa thành công!');
    }
}
