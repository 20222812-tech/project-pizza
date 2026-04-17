<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Đăng nhập - Pizza Shop</title>
    <style>
        body { margin:0; font-family: Arial, sans-serif; background:#f7f2ea; color:#1a1a1a; }
        .page { min-height:100vh; display:flex; align-items:center; justify-content:center; padding:24px; }
        .card { width:100%; max-width:420px; background:#ffffff; border-radius:18px; box-shadow:0 18px 50px rgba(0,0,0,.12); overflow:hidden; }
        .card-header { background:#d43b13; color:#fff; padding:32px 28px; text-align:center; }
        .card-header h1 { margin:0; font-size:1.8rem; letter-spacing:.02em; }
        .card-body { padding:28px; }
        .field { margin-bottom:18px; }
        label { display:block; margin-bottom:8px; font-weight:600; }
        input { width:100%; border:1px solid #d9d0c3; border-radius:10px; padding:12px 14px; font-size:1rem; }
        input:focus { outline:none; border-color:#d43b13; box-shadow:0 0 0 3px rgba(212,59,19,.12); }
        .button { width:100%; border:none; padding:14px; border-radius:12px; background:#d43b13; color:#fff; font-weight:700; cursor:pointer; font-size:1rem; }
        .button:hover { filter:brightness(1.02); }
        .secondary { display:block; margin-top:18px; text-align:center; color:#555; text-decoration:none; }
        .alert { padding:14px 16px; background:#fff2f0; border:1px solid #f2c6bd; color:#8c1d10; border-radius:10px; margin-bottom:16px; }
        .footer { margin-top:18px; font-size:.94rem; color:#666; text-align:center; }
    </style>
</head>
<body>
<div class="page">
    <div class="card">
        <div class="card-header">
            <h1>Pizza Shop</h1>
            <p>Đăng nhập để tiếp tục đặt pizza</p>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert">
                    <strong>Lỗi:</strong>
                    <ul style="margin: 8px 0 0 18px; padding:0; list-style:disc;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />
                </div>

                <div class="field">
                    <label for="password">Mật khẩu</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" />
                </div>

                <button class="button" type="submit">Đăng nhập</button>
            </form>

            <a class="secondary" href="{{ route('register') }}">Chưa có tài khoản? Đăng ký ngay</a>
        </div>
        <div class="footer">Sử dụng XAMPP + MySQL để lưu thông tin đăng nhập.</div>
    </div>
</div>
</body>
</html>
