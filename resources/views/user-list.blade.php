<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


</head>
<body class="home">
<ul>

    @foreach($users as $user)
        <li>{{$user->name}}<span>X</span></li>
    @endforeach
</ul>

</body>
</html>
