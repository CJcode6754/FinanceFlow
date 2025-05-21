@props(['title' => '', 'PageName' => ''])
<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-toker" content="{{csrf_token()}}">
    <title>{{$title}} | {{config('app.name', default: 'Laravel')}}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="shortcut icon" href="{{asset('assets/logo.png')}}" type="image/x-icon">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    {{$slot}}
</body>
</html>
