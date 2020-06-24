@extends('home')
@section('title', 'Danh sách tỉnh thành')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Danh sách khách hàng</h1>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên tỉnh thành</th>
                    <th>Số khách hàng</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($cities) == 0)
                    <tr>
                        <td colspan="4">không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($cities as $key => $city)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $city->name }}</td>
                            <td>{{ count($city->customers) }}</td>
                            <td><a href="{{ route('cities.edit', $city->id) }}">Sửa</a></td>
                            <td><a href="{{ route('cities.destroy', $city->id) }}" class="text-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a href="{{ route('cities.create') }}" class="btn btn-primary">Thêm mới</a>
        </div>
    </div>
@endsection

