<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ getDynamicAsset('assets/img/favicon.png') }}">
    
    <title>@yield('title', 'Online Management System')</title>
    @include('frontend.layouts.partials._style-assets')
</head>
<body>
    @include('frontend.layouts.partials._navbar')

    <div class="py-3">
        @yield('content')
    </div>

    @include('frontend.layouts.partials._script-assets')
</body>
</html>
