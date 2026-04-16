@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center text-success mb-4">➕ Thêm nhân viên</h2>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/nhanvien/store" method="POST">
                    @csrf

                    <input name="ten" value="{{ old('ten') }}" class="form-control mb-2" placeholder="Tên">
                    <input name="email" value="{{ old('email') }}" class="form-control mb-2" placeholder="Email">
                    <input name="sdt" value="{{ old('sdt') }}" class="form-control mb-2" placeholder="SĐT">
                    <input name="chuc_vu" value="{{ old('chuc_vu') }}" class="form-control mb-2" placeholder="Chức vụ">

                    <div class="d-flex justify-content-between">
                        <a href="/nhanvien" class="btn btn-secondary">⬅ Quay lại</a>
                        <button class="btn btn-success">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
