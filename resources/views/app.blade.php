<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ًApplication</title>
        @vite('resources/css/app.css')
    </head>
    <body class="inset-0">
        <div id="app" class="bg-primary selection:bg-secondary-lighter selection:text-white"></div>
        @vite('resources/js/app.js')
    </body>
</html>
