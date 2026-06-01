<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        @stack('styles')
    </head>
    <body class="@yield('bodyClass', 'antialiased')">
        @yield('content')
        
        @stack('scripts')
    </body>
</html>
