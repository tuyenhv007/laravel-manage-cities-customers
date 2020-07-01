<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="{{route('home')}}">{{ __('language.customers_application') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">{!! __('language.home') !!}<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{!! route('customers.index') !!}">{!! __('language.list_customer') !!}</a>
                    <a class="dropdown-item" href="{!! route('customers.create') !!}">{!! __('language.create_customer') !!}</a>
{{--                    <a class="dropdown-item" href="{{route('customers.edit')}}">Chỉnh sửa khách hàng</a>--}}
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{!! route('user.change-language', ['en']) !!}">English</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{!! route('user.change-language', ['vi']) !!}" tabindex="-1" >Vietnamese</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="{!! __('language.search') !!}">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{!! __('language.search') !!}</button>
        </form>
    </div>
</nav>
