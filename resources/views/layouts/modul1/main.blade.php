<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Sadam')
    </title>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{{ asset('/assets/fontawesome/css/all.min.css') }}">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/gogi-bundle.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/assets/css/gogi-app.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/custom-global.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.12.5/dist/sweetalert2.min.css" integrity="sha256-g63UuGJzNKJaeNzy1f7N4V59R3+DZamET2Fg0cXAGDQ=" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.12.5/dist/sweetalert2.all.min.js" integrity="sha256-vT8KVe2aOKsyiBKdiRX86DMsBQJnFvw3d4EEp/KRhUE=" crossorigin="anonymous"></script>

    {{-- Extra CSS --}}
    @yield('extra-css')
</head>
<body class="scrollable-layout">
    {{-- Start Preloader --}}
    <div class="preloader">
        <div class="preloader-icon"></div>
        <span>Loading...</span>
    </div>
    {{-- End of Preloader --}}

    {{-- Sidebar Group --}}
    {{-- @include('layouts/modul1/sidebar-group') --}}

    {{-- Start Layout Wrapper --}}
    <div class="layout-wrapper">

        {{-- Header --}}
        @include('layouts/header')

        {{-- Start Content Wrapper --}}
        <div class="content-wrapper">

            {{-- Navigation --}}
            @include('layouts/modul1/navigation')

            {{-- Start Content Body --}}
            <div class="content-body">

                {{-- Content --}}
                @yield('content')


                {{-- @include('layouts/modul1/session') --}}

                {{-- Footer --}}
                @include('layouts/footer')

            </div>
            {{-- End of Content Body --}}

        </div>
        {{-- End of Content Wrapper --}}
    </div>
    {{-- End of Layout Wrapper --}}
    
    {{-- Gogi Script --}}
    <script src="{{ asset('/assets/gogi/vendors/gogi-bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/assets/js/gogi-app.min.js') }}"></script>

    {{-- Fontawesome --}}
    <script src="{{ asset('/assets/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('/assets/js/custom-global.js') }}"></script>

    {{-- Extra Script --}}
    @yield('extra-script')
</body>
</html>