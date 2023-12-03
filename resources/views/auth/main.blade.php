<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sikom</title>

    @include('partials.link')
    @yield('links')

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>
    <div id="app">

        {{-- <div id="main" class="m-0 py-0"> --}}
        @yield('content')

    </div>

    @include('partials.script')
    {{-- realrashid/sweetalert --}}
    @include('sweetalert::alert')
    {{-- Tooltip globally --}}
    @vite(['resources/js/tooltip/globalTooltip.js'])
    {{-- Necessary scripts --}}
    @yield('scripts')

</body>

</html>
