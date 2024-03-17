<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body{
            background: linear-gradient(to right, #304352, #d7d2cc); 
        }

        .Editcontainer {
            max-width: 250px;
            margin: 0 auto; 
        }

        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .form-control{
            width: 300px;
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
                            Edit your profile, {{ auth()->user()->name }}
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
                        <a class="nav-link" href="{{ route('add_post_form') }}">Add post</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="Editcontainer mt-5">
    <h2>Edit Profile</h2>
    @if(session('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="lastname">Lastname</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ auth()->user()->lastname }}">
            @error('lastname')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="profile_picture">Profile Picture</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="profile_picture" name="profile_picture">
                <label class="custom-file-label form-control" for="profile_picture">Choose file</label>
            </div>
        </div>

        @if($user->profile_picture)
            <div class="form-group mt-2">
                <label>Current Picture:</label><br>
            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="img-fluid" style="max-width: 200px; max-heigh: 200px; border-radius: 30px;">
            </div>
        @endif


        <div class="form-group">
            <label for="old_password">Old Password</label>
            <input type="password" class="form-control" id="old_password" name="old_password">
            @error('old_password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm New Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            @error('password_confirmation')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('logged_in') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
