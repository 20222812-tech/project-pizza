<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class KhoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $materials = Material::when($search, function ($query) use ($search) {
                return $query->where('ten', 'like', "%$search%");
            })
            ->orderBy('so_luong')
            ->get();

        return view('kho.index', compact('materials', 'search'));
    }

    public function create()
    {
        return view('kho.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required',
            'don_vi' => 'required',
            'so_luong' => 'required|numeric|min:0',
            'gia_nhap' => 'required|numeric|min:0',
            'so_luong_toi_thieu' => 'required|numeric|min:1',
            'ngay_nhap' => 'required|date',
            'ghi_chu' => 'nullable'
        ]);

        Material::create($request->all());
        return redirect('/kho')->with('success', 'Thêm nguyên liệu thành công');
    }

    public function edit($id)
    {
        $material = Material::find($id);
        return view('kho.edit', compact('material'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ten' => 'required',
            'don_vi' => 'required',
            'so_luong' => 'required|numeric|min:0',
            'gia_nhap' => 'required|numeric|min:0',
            'so_luong_toi_thieu' => 'required|numeric|min:1',
            'ngay_nhap' => 'required|date',
            'ghi_chu' => 'nullable'
        ]);

        $material = Material::find($id);
        $material->update($request->all());
        return redirect('/kho')->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        Material::destroy($id);
        return redirect('/kho')->with('success', 'Xóa thành công');
    }
}
