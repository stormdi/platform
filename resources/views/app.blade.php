<!DOCTYPE html>
<html lang="{{  app()->getLocale() }}" data-controller="layouts--html-load">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','ORCHID') - @yield('description','Admin')</title>
    <meta name="csrf_token" content="{{  csrf_token() }}" id="csrf_token" data-turbolinks-permanent>
    <meta name="auth" content="{{  Auth::check() }}"  id="auth" data-turbolinks-permanent>
    @if(file_exists(public_path('/css/orchid/orchid.css')))
        <link rel="stylesheet" type="text/css" href="{{  mix('/css/orchid/orchid.css') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{  orchid_mix('/css/orchid.css','orchid') }}">
    @endif

    @stack('head')

    <meta name="turbolinks-root" content="{{  Dashboard::prefix() }}">
    <meta name="dashboard-prefix" content="{{  Dashboard::prefix() }}">

    <script src="{{ orchid_mix('/js/manifest.js','orchid') }}" type="text/javascript"></script>
    <script src="{{ orchid_mix('/js/vendor.js','orchid') }}" type="text/javascript"></script>
    <script src="{{ orchid_mix('/js/orchid.js','orchid') }}" type="text/javascript"></script>

    @foreach(Dashboard::getResource('stylesheets') as $stylesheet)
        <link rel="stylesheet" href="{{  $stylesheet }}">
    @endforeach

    @stack('stylesheets')

    @foreach(Dashboard::getResource('scripts') as $scripts)
        <script src="{{  $scripts }}" defer type="text/javascript"></script>
    @endforeach
</head>

<body class="d-flex flex-column h-100">


<div class="app flex-shrink-0" id="app" data-controller="@yield('controller')" @yield('controller-data')>

    <div class="bg-white">
        <div class="container">
            <div class="d-flex flex-column flex-md-row align-items-center p-3 pt-4" style="background: #fff; box-shadow: 0 1.6px 3.6px 0 rgba(0,0,0,.132), 0 0.3px 0.9px 0 rgba(0,0,0,.108);">

                <div class="d-sm-flex d-md-block my-0 v-center mr-md-auto">
                    <a href="#" class="header-toggler d-md-none mr-auto order-first"
                       data-toggle="collapse"
                       data-target="#headerMenuCollapse">
                        <span class="header-toggler-icon icon-menu"></span>
                        <span class="ml-2">@yield('title')</span>
                    </a>

                    <a class="header-brand order-last" href="{{route('platform.index')}}">
                        @includeFirst([config('platform.template.header'), 'platform::header'])
                    </a>
                </div>

                <nav class="my-2 my-md-0 mr-md-3 list-inline">
                    {!! Dashboard::menu()->render('Main') !!}
                </nav>

                @include('platform::partials.search')

                @includeWhen(Auth::check(), 'platform::partials.profile')
            </div>
        </div>
    </div>

    <div class="" style="background-color: #3d4146!important;color: #fff;">
        <div class="container">
            <div class="p-3 @hasSection('navbar') @else d-none d-md-block @endif" style="box-shadow: 0 1.6px 3.6px 0 rgba(0,0,0,.132), 0 0.3px 0.9px 0 rgba(0,0,0,.108);">
                <div class="v-md-center">
                    <div class="d-none d-md-block col-xs-12 col-md no-padder">
                        <h1 class="m-n font-thin h3 text-white">@yield('title')</h1>
                        <small class="text-muted" title="@yield('description')">@yield('description')</small>
                    </div>
                    <div class="col-xs-12 col-md-auto ml-auto no-padder">
                        <ul class="nav command-bar justify-content-sm-end justify-content-start v-center">
                            @yield('navbar')
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-lg">
        @yield('body-right')
    </div>

@include('platform::partials.toast')
</div>

<footer class="footer mt-auto py-3">
    <div class="container">
        @includeFirst([config('platform.template.footer'), 'platform::footer'])
    </div>
</footer>

@stack('scripts')


</body>
</html>
