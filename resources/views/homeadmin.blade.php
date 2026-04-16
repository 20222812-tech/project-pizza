@extends('layouts.app')

@section('content')

<h2 class="text-center mb-4">📊 DASHBOARD ADMIN</h2>

<div class="row g-4">

    <!-- NHÂN VIÊN -->
    <div class="col-md-3">
        <div class="card text-white bg-primary shadow">
            <div class="card-body text-center">
                <h5>👨‍🍳 Nhân viên</h5>
                <h2>{{ $tongNhanVien }}</h2>
            </div>
        </div>
    </div>

    <!-- SẢN PHẨM -->
    <div class="col-md-3">
        <div class="card text-white bg-danger shadow">
            <div class="card-body text-center">
                <h5>🍕 Sản phẩm</h5>
                <h2>{{ $tongSanPham }}</h2>
            </div>
        </div>
    </div>

    <!-- ĐƠN HÀNG -->
    <div class="col-md-3">
        <div class="card text-white bg-info shadow">
            <div class="card-body text-center">
                <h5>📦 Đơn hàng</h5>
                <h2>{{ $tongDonHang }}</h2>
            </div>
        </div>
    </div>

    <!-- DOANH THU -->
    <div class="col-md-3">
        <div class="card text-white bg-success shadow">
            <div class="card-body text-center">
                <h5>💰 Doanh thu</h5>
                <h4>{{ number_format($doanhThu) }} đ</h4>
            </div>
        </div>
    </div>
<div class="card mt-4 shadow">
    <div class="card-header bg-dark text-white">
        📊 Biểu đồ doanh thu (7 ngày gần nhất)
    </div>
    <div class="card-body">
        <canvas id="doanhThuChart" height="100"></canvas>
    </div>
</div>

</div>

<hr class="my-5">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('doanhThuChart').getContext('2d');
    const doanhThuChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartLabels) !!},
            datasets: [{
                label: 'Doanh thu (đ)',
                data: {!! json_encode($chartData) !!},
                borderColor: '#28a745',
                backgroundColor: 'rgba(40, 167, 69, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4,
                pointRadius: 5,
                pointBackgroundColor: '#28a745',
                pointBorderColor: '#fff',
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString() + ' đ';
                        }
                    }
                }
            }
        }
    });
</script>

@endsection
