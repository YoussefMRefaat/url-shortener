<!DOCTYPE html>
<html>
    <head>
        <title>URL Shortener</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{asset('css/home.css')}}" rel="stylesheet">
    </head>
    <body>
        <input type="text" name="link" id="link" placeholder="https://example.ex">
        <button onclick="shorten()">Shorten</button>
        <p id="code"></p>

        <script src="{{asset('js/AJAX.js')}}"></script>
    </body>
</html>
