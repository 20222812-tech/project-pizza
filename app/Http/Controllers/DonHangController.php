<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonHang;
use App\Models\SanPham;
use App\Models\KhachHang;

class DonHangController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $donhangs = DonHang::with('sanpham')
            ->when($search, function ($query, $search) {
                $query->where('ten_khach', 'like', "%{$search}%")
                    ->orWhere('sdt', 'like', "%{$search}%")
                    ->orWhere('dia_chi', 'like', "%{$search}%")
                    ->orWhere('trang_thai', 'like', "%{$search}%")
                    ->orWhereHas('sanpham', function ($q) use ($search) {
                        $q->where('ten', 'like', "%{$search}%");
                    });
            })
            ->get();

        return view('donhang.index', compact('donhangs', 'search'));
    }

    public function create()
    {
        $sanphams = SanPham::all();
        $khachhang = KhachHang::orderBy('ten')->get();
        return view('donhang.create', compact('sanphams', 'khachhang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_khach' => 'required',
            'sdt' => 'required',
            'dia_chi' => 'required',
            'san_pham_id' => 'required',
            'so_luong' => 'required|integer|min:1',
            'khach_hang_id' => 'nullable|exists:khach_hangs,id'
        ]);

        $sanpham = SanPham::find($request->san_pham_id);

        if (!$sanpham) {
            return back()->with('error', 'Sản phẩm không tồn tại');
        }

        $tongTien = $sanpham->gia * $request->so_luong;

        $donhang = DonHang::create([
            'ten_khach' => $request->ten_khach,
            'sdt' => $request->sdt,
            'dia_chi' => $request->dia_chi,
            'san_pham_id' => $sanpham->id,
            'so_luong' => $request->so_luong,
            'tong_tien' => $tongTien,
            'trang_thai' => 'Chờ xử lý',
            'khach_hang_id' => $request->khach_hang_id
        ]);

        // Cập nhật thống kê khách
        if ($donhang->khach_hang_id) {
            $donhang->khachhang->updateThongKe();
        }

        return redirect('/donhang')->with('success', 'Thêm đơn hàng thành công');
    }

    public function updateStatus(Request $request, $id)
    {
        $donhang = DonHang::find($id);

        if (!$donhang) {
            return back()->with('error', 'Không tìm thấy đơn hàng');
        }

        $donhang->trang_thai = $request->trang_thai;
        $donhang->save();

        return back()->with('success', 'Cập nhật trạng thái thành công');
    }

    public function destroy($id)
    {
        $donhang = DonHang::find($id);
        $khachhang = $donhang->khachhang;
        
        DonHang::destroy($id);
        
        // Cập nhật lại thống kê khách
        if ($khachhang) {
            $khachhang->updateThongKe();
        }
        
        return redirect('/donhang')->with('success', 'Xóa thành công');
    }
}
