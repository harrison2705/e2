<!doctype html>
<html lang='en'>
<head>

    <title>@yield('title', $app->config('app.name'))</title>

    <meta charset='utf-8'>

    <link rel='shortcut icon' href='/favicon.ico'>

    <link href='/css/style.css' rel='stylesheet'>

    @yield('head')

</head>
<body>

<main>
    @yield('content')
</main>

@yield('body')

</body>
</html>