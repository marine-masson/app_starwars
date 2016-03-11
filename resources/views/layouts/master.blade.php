<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('assets/css/knacss.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/app.min.css')}}">

</head>
<body>
    <header id="header">
    @include('partials.nav')
    </header>
    <div id="main">
        <div class="">
            <div class="content">
                @section('sidebar')
                @show
            </div>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
    <footer id="footer">

    </footer>
    @yield('scripts')
</body>
</html>