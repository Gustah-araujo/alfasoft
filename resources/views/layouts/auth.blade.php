<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AlfaSoft</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    @yield('meta')
</head>
<body>
    <main>
        <div class="main-container">
            <a href="/">AlfaSoft</a>

            <div class="content">
                @yield('content')
            </div>
        </div>
    </main>
</body>
</html>
