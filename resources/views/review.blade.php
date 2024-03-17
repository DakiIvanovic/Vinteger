<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinteger</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>

        body{
            background: linear-gradient(to right, #304352, #d7d2cc); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }
        /* Custom styles */
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
            color: #f8f9fa; /* Lighter shade for hover effect */
        }
        .dropdown-menu {
            background-color: #343a40; /* Dark background color for dropdown */
        }
        .dropdown-menu .dropdown-item {
            color: #fff;
        }
        .dropdown-menu .dropdown-item:hover {
            background-color: #343a40; /* Darker shade for hover effect */
        }
        /* Custom styles for posts */
        .posts-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px; /* Adjust margin top to leave space below the navbar */
        }

        .post {
            width: calc(33.33% - 20px);
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-sizing: border-box;
        }

        .post h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .post img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .post p {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .posted-at {
            color: #999;
            font-size: 14px;
        }



        .post {
    position: relative;
}

.post img {
    max-width: 100%;
    max-height: 200px; /* Set maximum height to 200px */
    object-fit: cover; /* Ensures the image maintains aspect ratio and fills the space */
}

.delete-form {
    position: absolute;
    bottom: 5px;
    right: 5px;
}  right: 5px;

        @media screen and (max-width: 992px) {
            .post {
                width: calc(50% - 20px);
            }
        }

        @media screen and (max-width: 768px) {
            .post {
                width: calc(100% - 20px);
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
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
                            See your posts, {{ auth()->user()->name }}
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

<!-- Posts -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="text-center mb-4">My posts</h1>
            <div class="posts-container">
                @foreach ($posts as $post)
                    <div class="post">
                        <h2>{{ $post->title }}</h2>
                        <img src="{{ Storage::url($post->image) }}" alt="Post Image">
                        <p>{{ $post->description }}</p>
                        <p class="posted-at">Posted at: {{ $post->created_at->format('d.m.Y H:i') }}</p>
                        <!-- Delete button -->
                        <form method="POST" action="{{ route('delete_post', ['id' => $post->id]) }}" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
