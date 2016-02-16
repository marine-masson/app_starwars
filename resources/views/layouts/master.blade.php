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
        <div class="grid-2">
            <div class="content">
                @section('sidebar')
                    <h1>Best Product</h1>
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