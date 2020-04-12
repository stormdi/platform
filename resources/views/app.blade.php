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

<body>


<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-dark">
    <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Features</a>
        <a class="p-2 text-dark" href="#">Enterprise</a>
        <a class="p-2 text-dark" href="#">Support</a>
        <a class="p-2 text-dark" href="#">Pricing</a>
    </nav>
    <a class="btn btn-outline-primary" href="#">Sign up</a>
</div>

<div class="app row m-n" id="app" style="background: #ececec"
     data-controller="@yield('controller')" @yield('controller-data')>
    <div class="container-lg m-0">
        <div class="row">
            {{--
            <div class="col-xl-1 bg-dark" style="max-width: 80px;">



                <div class="navigation navbar justify-content-center py-xl-7">
                    <ul class="nav navbar-nav flex-row flex-xl-column flex-grow-1 justify-content-between justify-content-xl-center py-3 py-lg-0" role="tablist">

                        <!-- Invisible item to center nav vertically -->
                        <li class="nav-item d-none d-xl-block flex-xl-grow-1">
                            <a class="nav-link position-relative p-0 py-xl-3" href="#" title="">
                                {!! \Orchid\Support\Facades\Dashboard::icon('orchid') !!}
                            </a>
                        </li>

                        <!-- Create group -->
                        <li class="nav-item">
                            <a href="http://localhost:8000/en/notifications" class="nav-link position-relative p-0 py-xl-3" data-controller="layouts--notification" data-layouts--notification-count="2" data-layouts--notification-url="http://localhost:8000/en/api/notifications" data-layouts--notification-method="post" data-layouts--notification-interval="60000">
                                <i class="icon-bell"></i>
                                <span class="badge badge-sm up bg-danger text-white" data-target="layouts--notification.badge"></span>
                            </a>
                        </li>



                        <!-- Friend -->
                        <li class="nav-item mt-xl-9">
                            <a class="nav-link position-relative p-0 py-xl-3" data-toggle="tab" href="#tab-content-friends" title="Friends" role="tab">
                                <i class="icon-like"></i>
                            </a>
                        </li>

                        <!-- Chats -->
                        <li class="nav-item mt-xl-9">
                            <a class="nav-link position-relative p-0 py-xl-3 active" data-toggle="tab" href="#tab-content-dialogs" title="Chats" role="tab">
                                <i class="icon-menu"></i>
                                <div class="badge badge-dot badge-primary badge-bottom-center"></div>
                            </a>
                        </li>

                        <!-- Profile -->
                        <li class="nav-item mt-xl-9">
                            <a class="nav-link position-relative p-0 py-xl-3" data-toggle="tab" href="#tab-content-user" title="User" role="tab">
                                <i class="icon-like"></i>
                            </a>
                        </li>

                        <!-- Demo only: Documentation -->
                        <li class="nav-item mt-xl-9 d-none d-xl-block flex-xl-grow-1">
                            <a class="nav-link position-relative p-0 py-xl-3" data-toggle="tab" href="#tab-content-demos" title="Demos" role="tab">
                                <i class="icon-like"></i>
                            </a>
                        </li>

                        <!-- Settings -->
                        <li class="nav-item mt-xl-9">
                            <a class="nav-link position-relative p-0 py-xl-3" href="settings.html" title="Settings">
                                {!! \Orchid\Support\Facades\Dashboard::icon('logout') !!}
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            --}}
            <div class="aside col-xs-12 col-md-2 offset-xxl-0 col-xl-3 col-xxl-3">
                <div class="d-md-flex align-items-start flex-column d-sm-block h-100">
                    @yield('body-left')
                </div>
            </div>

            <div class="col-md col-xl col-xxl-9 no-padder min-vh-100 border-right border-left"
                 style="background: #fcfcfc">
                @yield('body-right')
            </div>
        </div>
    </div>


    @include('platform::partials.toast')
</div>

@stack('scripts')


</body>
</html>
