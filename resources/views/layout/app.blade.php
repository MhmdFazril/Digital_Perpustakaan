<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- daisyui CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
</head>

<body>
    <x-navbar></x-navbar>
    @yield('content')
</body>
<script src="/js/script.js"></script>

</html>
