<!doctype html>
<html>

<head>
    @include('includes.head')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            @include('includes.header')
        </header>
        <aside class="main-sidebar">
            @include('includes.sidebar')
        </aside>
        <div class="content-wrapper">
            @yield('content')
        </div>
        <footer class="main-footer">
            @include('includes.footer')
        </footer>
    </div>
</body>

@include('includes.foot')
@yield('additional_foot')

</html>