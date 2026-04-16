@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center text-warning mb-4">✏️ Sửa nhân viên</h2>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/nhanvien/update/{{ $nv->id }}" method="POST">
                    @csrf

                    <input name="ten" value="{{ old('ten', $nv->ten) }}" class="form-control mb-2">
                    <input name="email" value="{{ old('email', $nv->email) }}" class="form-control mb-2">
                    <input name="sdt" value="{{ old('sdt', $nv->sdt) }}" class="form-control mb-2">
                    <input name="chuc_vu" value="{{ old('chuc_vu', $nv->chuc_vu) }}" class="form-control mb-2">

                    <div class="d-flex justify-content-between">
                        <a href="/nhanvien" class="btn btn-secondary">⬅ Quay lại</a>
                        <button class="btn btn-warning">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
