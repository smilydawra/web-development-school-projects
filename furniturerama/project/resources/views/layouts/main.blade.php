<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Furniturerama' }}</title>
    <link rel='stylesheet' href='/css/app.css'>
    <!--favorite icon on tab-->
    <link rel="icon" href="/images/logo_small.svg" type="image/x-icon" />
</head>
    <body class='bg'>
        <header>
            @include('partials/nav')
            @include('partials/flash')
        </header>
        <main>
            @yield('content')
        </main>
        @include('partials/footer')
        <script src="/js/app.js"></script>
    </body>
</html>
