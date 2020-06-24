@extends('home')
@section('title', 'Cập nhập thông tin tỉnh thành')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Chỉnh sửa tỉnh thành</h1>
            </div>
            <div class="col-12">
                <form action="{{ route('cities.update', $city->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên tỉnh</label>
                        <input type="text" class="form-control" name="name" value="{{ $city->name }} " required>
                    </div>
                    <button class="btn btn-primary" type="submit">Cập nhập tỉnh thành</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1);return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection
