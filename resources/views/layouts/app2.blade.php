<!DOCTYPE html>
<html lang="en">
<!-- Title Meta -->
    <meta charset="utf-8" />
    <title>@yield('title') | Larkon - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully responsive premium admin dashboard template" />
    <meta name="author" content="Techzaa" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <!-- Vendor css (Require in all Page) -->
    <link href="{{asset('assets/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons css (Require in all Page) -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App css (Require in all Page) -->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Theme Config js (Require in all Page) -->
    <script src="{{asset('assets/js/config.js')}}"></script>
    <body>

        {{-- <div class="page-wrapper toggled">
            <main class="page-content bg-gray-50"> --}}
        <div class="wrapper">

                {{-- Navbar --}}
                @include('content.topbar')

                @include('content.navbar')

                {{-- Sidebar --}}

                {{-- Right Sidebar --}}

                {{-- Main Content --}}
                 <main>
                    @yield('content')
                </main>

                {{-- Footer --}}
                @include('content.footer')

            </main>
        </div>
        <!-- Vendor Javascript (Require in all Page) -->
        <script src="{{asset('assets/js/vendor.js')}}"></script>

        <!-- App Javascript (Require in all Page) -->
        <script src="{{asset('assets/js/app.js')}}"></script>
        @yield('scripts')
    </body>
</html>
