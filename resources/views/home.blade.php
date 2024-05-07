<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>BlogByte</title>
</head>

<body>
    {{-- @auth
        <p>Welcome</p>
        <form action="/logout" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form> --}}

    {{-- <h2>Create Post</h2>
        <form action="/create-post" method="post">
            @csrf
            <input type="text" name="title" placeholder="Title">
            <textarea name="body" placeholder="Content"></textarea>
            <button type="submit">Create</button>
        </form>

        <div style="border: 3px, solid black">
            
        <h2>All Posts</h2>
        @foreach ($posts as $post)
            <div style="background-color:gray; padding:10px; margin:10px">
                <h3>{{ $post->title }} by {{$post->user->name}}</h3>
                <p>{{ $post->body }}</p>
                <form action="/delete-post/{{ $post->id }}" method="post">
                    @csrf
                    <button type="submit">Delete</button>
                </form>
                <form action="/edit-post/{{ $post->id }}" method="post">
                    @csrf
                    <button type="submit">Edit</button>
                </form>
            </div>
        @endforeach
        </div>
    @else
        <div>
            <h2>Register</h2>
            <form action="/register" method="post">
                @csrf
                <input type="text" name="name" placeholder="Name">
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit">Register</button>
            </form>
        </div>
        <div> --}}
        <div id="header">
            <div id="logo">
                <h1><span>Blog</span>Byte</h1>
            </div>
        </div>
        <div id="login-container">
            <h2>Login</h2>
            <form action="/login" method="post">
                @csrf
                <input type="text" name="email" placeholder="E-mail">
                <input type="password" name="password" placeholder="Password">
                <button type="submit">Login</button>
                <p>Don't have an account? <a href="/register">Register</a></p>
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

    </body>

    </html>
