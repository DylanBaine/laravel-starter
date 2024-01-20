@props(['title', 'canonical', 'previewImage', 'noHeader', 'noFooter', 'theme'])
<!DOCTYPE html>
<html lang="en" data-theme="{{ $theme ?? 'light' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @if (isset($title))
        <title>{{ $title }} | {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    @vite('resources/css/app.css')
</head>

<body>
    @if (!isset($noHeader))
        <x-header />
    @endif

    {{ $slot }}

    @if (!isset($noFooter))
        <x-footer />
    @endif

    @vite('resources/js/app.js')
</body>

</html>
