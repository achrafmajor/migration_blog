<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- csrf -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.layout.parts.head')
    @include('admin.layout.parts.js')


</head>

<body>


    <!-- loading overlay -->
    @include('admin.layout.parts.loading-overlay')


    <!-- navbar -->
    @include('admin.layout.parts.navbar')


    <!-- Page content -->
    <div class="page-content">
        @include('admin.layout.parts.sidebar')


        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Inner content -->
            <div class="content-inner">
                @yield('page-header')
                @yield('content')
                @include('admin.layout.parts.footer')
            </div>
        </div>
    </div>
    @include('admin.layout.parts.footer-scripts')

</body>

</html>
