<!DOCTYPE html>
<html lang="en">
    @include('userside.userside_source.userside_partials.header')

    <body class="animsition">

        @include('userside.userside_source.userside_partials.nav')
       

        @yield('content')

        @include('userside.userside_source.userside_partials.footer')

    </body>
</html>