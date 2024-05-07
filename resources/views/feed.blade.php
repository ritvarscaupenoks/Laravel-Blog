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
        <div id="feed">
            <h2>Feed</h2>
            @foreach ($posts as $post)
                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->body }}</p>
                    <p>By {{ $post->user->name }}</p>
                </div>
            @endforeach
        </div>
    @endauth
</body>

</html>
