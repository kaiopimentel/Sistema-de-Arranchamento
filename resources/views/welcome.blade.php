<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* Estilos básicos e necessários */
            body {
                font-family: Figtree, sans-serif;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: #f8fafc;
            }
            .container {
                text-align: center;
            }
            a {
                display: inline-block;
                margin: 10px;
                padding: 10px 15px;
                color: #636b6f;
                font-size: 20px;
                font-weight: 600;
                text-decoration: none;
                border: 1px solid #636b6f;
                border-radius: 5px;
                transition: color 0.3s, border-color 0.3s;
            }
            a:hover {
                color: #4a5568;
                border-color: #4a5568;
            }
        </style>
    </head>
    <body>
        <div class="container">
            @if (Route::has('login'))
                <div class="links">
                    @auth
                        <a href="{{ url('/arranchamentos') }}">Arranchamento</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
