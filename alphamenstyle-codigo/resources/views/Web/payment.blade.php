<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Alpha</title>
    <link href="{{ asset('web/assets/style.css') }}" rel="stylesheet" type="text/css">
    <meta name="description" content="Favorece tu silueta. Con prendas y colores que te harán lucir increíble.">
</head>

<body>
    <div id="app">
        <payment></payment>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>

</html>
