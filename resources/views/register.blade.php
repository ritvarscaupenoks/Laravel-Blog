<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Signup</title>
</head>

<body>

</body>

</html>
<div id="header">
    <div id="logo">
        <h1><span>Blog</span>Byte</h1>
    </div>
</div>
<div id="login-container">
    <h2>Register</h2>
    <form action="/register" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="email" placeholder="E-mail">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Signup</button>
        <p>Already have an account? <a href="/">Login</a></p>
    </form>
</div>
<div class="alert-container">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert">
                <p>{{ $error }}</p>
            </div>
        @endforeach
    @endif
</div>
