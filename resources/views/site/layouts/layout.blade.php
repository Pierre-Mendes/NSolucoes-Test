<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @include('site.layouts._includes.head')
        <title>@yield('title')</title>
    </head>
    <body>
        @include('site.layouts._includes.header')
        @yield('content')

        <script>

            @yield('scripts')
        </script>
    </body>
</html>
