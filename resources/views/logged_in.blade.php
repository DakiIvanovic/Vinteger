<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinteger</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body{
            background: linear-gradient(to right, #304352, #d7d2cc); 
        }        

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            font-size: 1.1rem;
            padding: 0.5rem 1rem;
            color: #fff;
        }
        .navbar-nav .nav-link:hover {
            color: #f8f9fa;
        }
        .dropdown-menu {
            background-color: #343a40;
        }
        .dropdown-menu .dropdown-item {
            color: #fff;
        }
        .dropdown-menu .dropdown-item:hover {
            background-color: #343a40; 
        }

        .post {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            padding: 20px;
        }
        .post h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .post hr {
            margin: 20px 0;
            border: none;
            border-bottom: 1px solid #ccc;
        }
        .post p {
            font-size: 1.1rem;
            margin-bottom: 20px;
            color: #666;
        }
        .post img {
            max-width: 200px;
            max-height: 200px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .post p.posted-by {
            font-size: 1rem;
            color: #888;
        }
    </style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('logged_in') }}">Vinteger</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hello {{ auth()->user()->name }}, welcome to Vinteger
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('logged_in') }}">Home</a>
                            <a class="dropdown-item" href="{{ route('profile.review') }}">Profile</a>
                            <a class="dropdown-item" href="{{ route('profile.show') }}">Settings</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('add_post_form') }}">Dodaj Post</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="text-center mb-4">Vinteger</h1>
            @foreach ($posts as $post)
            <div class="post">
                <h2>{{ $post->title }}</h2>
                <hr>
                <p>Opis: {{ $post->description }}</p>
                <hr>
                <img src="{{ Storage::url($post->image) }}" alt="Post Image">
                <p class="posted-by">Posted by: {{ $post->user->name }}</p>
                <p class="posted-at">Posted at: {{ $post->created_at->format('d.m.Y H:i') }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
