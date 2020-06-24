@extends('home')
@section('title', 'Chỉnh sửa khách hàng')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12"><h1>Chỉnh sửa khách hàng</h1></div>
            <div class="col-12">
                <form action="{{ route('customers.update', $customer->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên khách hàng</label>
                        <input type="text" class="form-control" name="name" value="{{ $customer->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $customer->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Ngày sinh</label>
                        <input type="date" class="form-control" name="dob" value="{{ $customer->dob }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tỉnh thành</label>
                        <select name="city_id" id="" class="form-control">
                            @foreach($cities as $city)
                                <option
                                    @if($customer->city_id == $city->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Chỉnh sửa</button>
                    <buntoon class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</buntoon>
                </form>
            </div>
        </div>
    </div>
@endsection
