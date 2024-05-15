<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SIMAK</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="key" content="{{ env('APP_KEY') }}">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('static/img/logo.svg') }}" type="image/svg+xml" />
    @include('BE.Layouts.styles')
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header position-relative" style="background-color: #E72929">
                <a href="/" class="logo ">
                    <img src="{{ asset('assets/FE/img/logo3.webp') }}" class="navbar-brand" width="100"
                        alt="logo">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            @include('BE.Layouts.Navbar')
        </div>

        @include('BE.Layouts.Sidebar')
        <div class="main-panel">
            <div class="content">
                @yield('content')
            </div>
            @include('BE.Layouts.footer')
        </div>
    </div>
    @include('BE.Layouts.scripts')
    @yield('js-url')
</body>

</html>
