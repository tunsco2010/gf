<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.meta')

    @yield('title')

    @include('layouts.css')

    @yield('css')

</head>

<body role="document">

@include('layouts.nav')


<div class="container theme-showcase" role="main">

    <div id="app">
        @yield('content')
    </div>


    {{--<hr>--}}
    <br>
    <br>

    @include('layouts.bottom')

</div> <!-- /container -->

@include('layouts.scripts')

@include('Alerts::show')

@yield('scripts')

</body>
</html>