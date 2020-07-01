@extends('home')
@section('title', 'Thêm mới khách hàng')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>{!! __('language.create_customer') !!}</h1>
            </div>
            <div class="col-12">
                <form action="{{ route('customers.store') }}" method="post">
                    @csrf

                    @if ($errors->all())
                        <div class="alert alert-danger">
                            Có vấn đề khi thêm mới khách hàng!
                        </div>
                        @endif
                    <div class="form-group">
                        <label class="{{$errors->first('name') ? 'text-danger' : ''}})"><strong>{!! __('language.name') !!}</strong></label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" >
                        @if ($errors->first('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail" class="{{$errors->first('name') ? 'text-danger' : ''}})"><strong>Email</strong></label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" >
                        @if ($errors->first('email'))
                            <p class="text-danger">{{$errors->first('email')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBirthday" class="{{$errors->first('name') ? 'text-danger' : ''}})"><strong>{!! __('language.dob') !!}</strong></label>
                        <input type="date" class="form-control" name="dob" >
                        @if ($errors->first('dob'))
                            <p class="text-danger">{{$errors->first('dob')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="{{$errors->first('name') ? 'text-danger' : ''}})"><strong>{!! __('language.province') !!}</strong></label>
                        <select name="city_id" id="" class="form-control">
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->first('city_id'))
                            <p class="text-danger">{{$errors->first('city_id')}}</p>
                        @endif
                    </div>
                    <button class="btn btn-primary" type="submit">{!! __('language.create') !!}</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1);return false;">{!! __('language.cancel') !!}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
