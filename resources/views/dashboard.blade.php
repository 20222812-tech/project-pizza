<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - Pizza Shop</title>
    <style>
        body { margin:0; font-family: Arial, sans-serif; background:#fff7ee; color:#1a1a1a; }
        .page { min-height:100vh; display:flex; align-items:center; justify-content:center; padding:24px; }
        .panel { width:100%; max-width:760px; background:#fff; border-radius:24px; box-shadow:0 22px 60px rgba(0,0,0,.12); overflow:hidden; }
        .hero { display:flex; flex-direction:column; gap:18px; padding:36px; }
        h1 { margin:0; font-size:2.3rem; color:#d43b13; }
        p { margin:0; color:#4b4b4b; line-height:1.6; }
        .actions { display:flex; flex-wrap:wrap; gap:12px; margin-top:20px; }
        .button { border:none; padding:14px 22px; border-radius:12px; cursor:pointer; background:#d43b13; color:#fff; font-weight:700; text-decoration:none; }
        .button-secondary { background:#f2e2dc; color:#1a1a1a; }
        .cards { display:grid; grid-template-columns:repeat(auto-fit, minmax(200px,1fr)); gap:16px; padding:0 36px 36px; }
        .card { padding:18px; border-radius:18px; background:#fff2f1; border:1px solid #f1d2cb; }
    </style>
</head>
<body>
<div class="page">
    <div class="panel">
        <div class="hero">
            <h1>Xin chào, {{ auth()->user()->name }}!</h1>
            <p>Chào mừng đến với hệ thống quản lý khách hàng Pizza Shop. Ở đây bạn có thể xem trạng thái đơn hàng, cập nhật thông tin và tiếp tục đặt pizza.</p>
            <div class="actions">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="button">Đăng xuất</button>
                </form>
                <a class="button button-secondary" href="{{ route('home') }}">Về trang đăng nhập</a>
            </div>
        </div>
        <div class="cards">
            <div class="card">
                <h2>Menu Pizza</h2>
                <p>Hiện tại trang demo tập trung vào đăng nhập/đăng ký. Bạn có thể mở rộng thêm phần đặt món sau.</p>
            </div>
            <div class="card">
                <h2>Thông tin tài khoản</h2>
                <p>Email: {{ auth()->user()->email }}</p>
            </div>
            <div class="card">
                <h2>Hỗ trợ XAMPP</h2>
                <p>Ứng dụng hiện đang kết nối tới cơ sở dữ liệu MySQL của XAMPP.</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
