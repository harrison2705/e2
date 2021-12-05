<!doctype html>
<html lang='en'>
<head>

    <title>@yield('title', $app->config('app.name'))</title>

    <meta charset='utf-8'>

    <link rel='shortcut icon' href='/favicon.ico'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
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