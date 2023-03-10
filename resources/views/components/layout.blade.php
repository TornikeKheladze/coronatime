<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coronatime </title>
    <link rel="icon" href="{{ URL::asset('corona.png') }}" type="image/x-icon"/>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <style>
        #scrollbar::-webkit-scrollbar {
            margin-top:50px;
            width: 6px;
        }
        #scrollbar::-webkit-scrollbar-thumb {
            background: #808189;
            border-radius: 8px;
            height: 56px;
            
        }
       
    </style>
    <script src="{{ asset('app.js') }}"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

</head>

<body class="box-border m-auto">
    {{ $slot }}
</body>

</html>
