@extends('home')
@section("title", "{!! __('language.edit_customer') !!}")
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12"><h1>{!! __('language.edit_customer') !!}</h1></div>
            <div class="col-12">
                <form action="{{ route('customers.update', $customer->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">{!! __('language.name') !!}</label>
                        <input type="text" class="form-control" name="name" value="{{ $customer->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $customer->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">{!! __('language.dob') !!}</label>
                        <input type="date" class="form-control" name="dob" value="{{ $customer->dob }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">{!! __('language.province') !!}</label>
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
                    <button class="btn btn-primary" type="submit">{!! __('language.edit') !!}</button>
                    <buntoon class="btn btn-secondary" onclick="window.history.go(-1); return false;">{!! __('language.cancel') !!}</buntoon>
                </form>
            </div>
        </div>
    </div>
@endsection
