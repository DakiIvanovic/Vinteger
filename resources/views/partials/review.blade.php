<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ auth()->user()->name }}'s profile</title>
    <link rel="stylesheet" href="css/review.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>
<body>

@include('replenishment.navbar');

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="profile-info">
                <h2>Your Profile</h2>
                <form>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" disabled>
                        <a href="{{ route('profile.show') }}">Change name</a>
                    </div>

                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ auth()->user()->lastname }}" disabled>
                        <a href="{{ route('profile.show') }}">Change lastname</a>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" disabled>
                        <a href="{{ route('profile.show') }}">Change email</a>
                    </div>

                    @if($user->profile_picture)
                    <div class="form-group mt-2">
                        <label>Current Picture:</label><br>
                        <img class="curent_picture" src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="img-fluid"><br>
                        <a href="{{ route('profile.show') }}">Change profile picture</a>
                    </div>
                    @endif
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="posts">
                <h2>Your Posts</h2>
                @if ($posts->isEmpty())
                    <p class="no_post">You don't have any posts yet</p>
                    <p class="no_post">Add new post -> <a class="no_post_href" href="{{ route('add_post') }}">Here</p></a>
                @else
                    <div class="row">
                        @foreach ($posts->reverse() as $post) 
                        <div class="col-md-4">
                            <div class="post">
                                @php
                                    $postDate = \Carbon\Carbon::parse($post->created_at);
                                    $now = \Carbon\Carbon::now();
                                    $isNew = $postDate->diffInHours($now) < 1;
                                @endphp
                                @if ($isNew)
                                    <span class="new-badge">NEW</span>
                                @endif
                                <h3>{{ $post->title }}</h3>
                                <img src="{{ Storage::url($post->image) }}" alt="Post Image">
                                <p>{{ $post->description }}</p>
                                <p class="posted-at">Posted at: {{ $post->created_at->format('d.m.Y H:i') }}</p>
                                <form method="POST" action="{{ route('delete_post', ['id' => $post->id]) }}" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">Delete</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@include('partials.footer');

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
