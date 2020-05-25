@extends('platform::app')

@section('body-right')

    @if (Breadcrumbs::exists())
        {{ Breadcrumbs::view('platform::partials.breadcrumbs') }}
    @endif

    <div class="d-flex">
        <div class="app-content-body" id="app-content-body" style="background: #fff; box-shadow: 0 1.6px 3.6px 0 rgba(0,0,0,.132), 0 0.3px 0.9px 0 rgba(0,0,0,.108);">
            @include('platform::partials.alert')
            @yield('content')
        </div>
    </div>
@endsection
