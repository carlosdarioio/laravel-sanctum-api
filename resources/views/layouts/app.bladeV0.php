<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name','LsApp')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">

    </head>    
    <body>
        @include('inc.navbar')
        <div class="container">
            <!--incluyendo inc para mostrar errores de forms-->
            @include('inc.messages')
            @yield('content')
        </div>        
    </body>
</html>
