<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css')  }}">
    @yield('custom_styles')

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:wght@300;400;500;700&display=swap" rel="stylesheet">

</head>
<body>
    @include('frontend.parts.header')

    <main class="main">
        @yield('content')
    </main>

    @include('frontend.parts.footer')
</body>
</html>
