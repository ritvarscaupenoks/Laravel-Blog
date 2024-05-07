<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>BlogByte</title>
</head>
<body>
    @auth
        <div id="header">
            <div id="logo">
                <h1><span>Blog</span>Byte</h1>
            </div>
            <div id="nav">
                <a href="/feed">All posts</a>
                <a href="/my-posts">My posts</a>
                <a href="/create-post">Create post</a>
            </div>
            <div id="logout">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="logout-button">Logout</button>
                </form>
            </div>
        </div>
        <div id="edit-post">
            <h2>Edit post</h2>
            <form action="/edit-post/{{ $post->id }}" method="post">
                @csrf
                @method('PUT')
                <input type="text" name="title" value="{{ $post->title }}">
                <textarea name="body">{{ $post->body }}</textarea>
                <button type="submit">Edit</button>
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
    @endauth
</body>
</html>