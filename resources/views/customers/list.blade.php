@extends('home')
@section('title', 'Danh sách khách hàng')
@section('content')
    <div class="col-12 pt-3">
        <div class="row">
            <div class="col-12">
                <h2>{!! __('language.list_customer') !!}</h2>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#cityModal">
                            {!! __('language.filter') !!}
                        </a>
                        @if(\Illuminate\Support\Facades\Session::has('success'))
                            <p class="text-success">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                {{ \Illuminate\Support\Facades\Session::get('success') }}
                            </p>
                        @endif

                        @if(isset($totalCustomerFilter))
                            <span class="text-muted">
                        {{'Tìm thấy'. ' ' . $totalCustomerFilter . ' ' . 'khách hàng'}}
                    </span>
                        @endif

                        @if(isset($cityFilter))
                            <div class="pl-5">
                        <span class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>
                            {{ 'Thuộc tính' . ' ' . $cityFilter->name }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="col-6">
                        <form action="{{ route('customers.search') }}" class="navbar-form navbar-left" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="keyword" placeholder="Search" value="{{ (isset($_GET['keyword'])) ? $_GET['keyword'] : '' }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-default" type="submit">{!! __('language.search') !!}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">{!! __('language.name') !!}</th>
                    <th scope="col">{!! __('language.dob') !!}</th>
                    <th scope="col">Email</th>
                    <th scope="col">{!! __('language.province') !!}</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($customers) == 0)
                    <tr>
                        <td colsapn="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($customers as $key => $customer)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->dob }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->city->name }}</td>
                            <td><a href="{{route('customers.edit', $customer->id) }}">{!! __('language.edit') !!}</a></td>
                            <td><a href="{{ route('customers.destroy', $customer->id) }}" class="text-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">{!! __('language.delete') !!}</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('customers.create') }}" class="btn btn-primary">{!! __('language.create') !!}</a>
                    </div>
                    <div class="col-6">
                        <div class="pagination float-right">
                        {{ $customers->appends(request()->query()) }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{--        Modal--}}
        <div class="modal fade" id="cityModal" role="dialog">
            <div class="modal-dialog modal-lg">
                {{--                Modal content--}}
                <form action="{{ route('customers.filterByCity') }}" method="get">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" type="button" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            {{--                            Loc theo khoa hoc--}}
                            <div class="select-by-program">
                                <div class="form-group row">
                                    <label for="" class="col-sm-5 col-form-label border-right">Lọc khách hàng theo tỉnh
                                        thành</label>
                                    <div class="col-sm-7">
                                        <select name="city_id" id="" class="custom-select w-100">
                                            <option>Chọn tỉnh thành</option>
                                            @foreach($cities as $city)
                                                @if(isset($cityFilter))
                                                    @if($city->id == $cityFilter->id)
                                                        <option value="{{$city->id}}"
                                                                selected>{{ $city->name }}</option>
                                                    @else
                                                        <option value="{{$city->id}}">{{ $city->name }}</option>
                                                    @endif
                                                @else
                                                    <option value="{{$city->id}}">{{ $city->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{--                                </form>--}}
                            </div>
                            {{--                            End--}}
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="submitAjax">Chọn</button>
                            <button class="btn btn-outline-secondary" data-dismiss="modal">{!! __('language.cancel') !!}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
