<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="description" content="">
    <title>{{ config('app.name', 'BTC Resume') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link rel="shortcut icon" href="{{ $media->favicon }}" type="image/x-icon"> --}}

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/js/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/js/plugins/noty/noty.min.js') }}"></script>

    {{-- DataTables --}} <!-- 
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  -->

    {{--jquery--}}
    <script src="{{ asset('dashboard_files/js/jquery-3.3.1.min.js') }}"></script>

    <!-- Font-awesome 4 css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">

    <!-- CKEditor -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard_files/sceditor/minified/themes/default.min.css') }}">
    <script src="{{ asset('dashboard_files/sceditor/minified/formats/xhtml.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/sceditor/minified/sceditor.min.js') }}"></script>

    @include('includes._dashboard_color')

    @yield('styles')
</head>

<body class="app sidebar-mini">

    {{-- Header --}}
    @include('layouts.dashboard._header')

    {{-- Sidebar --}}
    @include('layouts.dashboard._aside')

    <main class="app-content">
        {{-- Sessions --}}
        @include('manage.partials._sessions')
        <div id="app">
            @yield('content')
        </div>
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('dashboard_files/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>
    {{--select 2--}}
    <script src="{{ asset('dashboard_files/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/js/main.js') }}"></script>


    <script>
        // Replace the textarea #example with SCEditor
        var textarea = document.getElementById('textarea');
        sceditor.create(textarea, {
            format: 'xhtml',
            style: 'minified/themes/content/default.min.css'
        });

    </script>
    @yield('scripts')
</body>

</html>
