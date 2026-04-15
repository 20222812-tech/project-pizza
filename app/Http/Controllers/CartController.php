<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Thêm vào giỏ hàng
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'size' => 'required|in:small,medium,large'
        ]);

        $product = Product::findOrFail($request->product_id);

        // Tính giá theo size
        $price = $product->price;
        if ($request->size == 'small') {
            $price = $product->price * 0.8;
        } elseif ($request->size == 'large') {
            $price = $product->price * 1.2;
        }

        // Kiểm tra sản phẩm đã có trong giỏ chưa
        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->where('size', $request->size)
            ->first();

        if ($cart) {
            $cart->quantity += $request->quantity;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'size' => $request->size,
                'quantity' => $request->quantity,
                'price' => $price
            ]);
        }

        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }

    // Xem giỏ hàng
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    // Cập nhật giỏ hàng
    public function update(Request $request)
    {
        foreach ($request->quantities as $id => $quantity) {
            $cart = Cart::find($id);
            if ($cart && $cart->user_id == Auth::id()) {
                if ($quantity <= 0) {
                    $cart->delete();
                } else {
                    $cart->quantity = $quantity;
                    $cart->save();
                }
            }
        }

        return redirect()->route('cart.index')->with('success', 'Đã cập nhật giỏ hàng!');
    }

    // Xóa sản phẩm khỏi giỏ
    public function remove($id)
    {
        $cart = Cart::find($id);
        if ($cart && $cart->user_id == Auth::id()) {
            $cart->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Đã xóa sản phẩm!');
    }

    // Xóa toàn bộ giỏ
    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('cart.index')->with('success', 'Đã xóa toàn bộ giỏ hàng!');
    }

    // Thanh toán
    public function checkout()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('cart.checkout', compact('cartItems', 'total'));
    }

    // Xử lý đặt hàng
    public function placeOrder(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_address' => 'required',
            'payment_method' => 'required'
        ]);

        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Tạo đơn hàng
        $order = Order::create([
            'order_code' => Order::generateOrderCode(),
            'user_id' => Auth::id(),
            'total_amount' => $total,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'note' => $request->note
        ]);

        // Tạo chi tiết đơn hàng
        foreach ($cartItems as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'product_name' => $item->product->name,
                'size' => $item->size,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'subtotal' => $item->price * $item->quantity
            ]);
        }

        // Xóa giỏ hàng
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('cart.success', $order->id)->with('success', 'Đặt hàng thành công!');
    }

    // Trang đặt hàng thành công
    public function orderSuccess($id)
    {
        $order = Order::with('orderDetails.product')->findOrFail($id);

        return view('cart.success', compact('order'));
    }
}
