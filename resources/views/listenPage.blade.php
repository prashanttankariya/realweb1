<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.js') }}">
</head>
<body>
        <h1>Listen now!</h1>
        <hr>

    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script>
         Echo.private('messageChannel')
        .listen('messageEvent',(e) => {
                console.log(e);
        });
    </script> --}}
</body>
</html>