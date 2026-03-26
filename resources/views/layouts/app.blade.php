<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Quản lý nhân viên')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUa6mYfrn8+dM+5Q4M0W+RNQz5r/2B4wI5ic2eRjB2xXQMFuDZgLJjo5l6a9" crossorigin="anonymous">
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; background-color: #f8f9fa; color: #212529; }
        .container { max-width: 1140px; margin: 0 auto; padding: 1rem 1.25rem; }
        .navbar { background-color: #0d6efd; color: #fff; }
        .navbar a { color: #fff !important; text-decoration: none; }
        .navbar a:hover { opacity: .9; }
        .card { background-color: #fff; border: 1px solid #e9ecef; border-radius: .375rem; box-shadow: 0 .125rem .25rem rgba(0,0,0,.075); }
        .btn { text-decoration: none; }
        .table thead { background-color: #e9ecef; }
        .table th, .table td { vertical-align: middle; }
        .alert { margin-top: 1rem; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/nhanvien">Nhân viên</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Chuyển đổi điều hướng">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/nhanvien">Danh sách</a></li>
                    <li class="nav-item"><a class="nav-link" href="/nhanvien/create">Thêm mới</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="alert alert-info" role="alert">
            Giao diện đã nâng cấp với Bootstrap (nếu vẫn thấy cũ, hãy ấn Ctrl+F5 hoặc mở trình duyệt ẩn danh).
        </div>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>