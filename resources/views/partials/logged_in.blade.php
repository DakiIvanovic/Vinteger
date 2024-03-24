<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/logged_in.css">
    <title>Vinteger</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>
<body>

@include('replenishment.navbar');
@include('replenishment.background')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="text-center mb-4"> {{ auth()->user()->name }}'s Vinteger</h1>
            @php
                $reversedPosts = $posts->reverse();
            @endphp
            @foreach ($reversedPosts as $post)
            <div class="post">
            @php
                $postDate = \Carbon\Carbon::parse($post->created_at);
                $now = \Carbon\Carbon::now();
                $isNew = $postDate->diffInDays($now) < 1;
            @endphp
            @if ($isNew)
                <span class="new-badge">NEW</span>  
            @endif
            <h2>{{ $post->title }}</h2>
            <hr>
            <p>Description: {{ $post->description }}</p>
            <hr>
            <img src="{{ Storage::url($post->image) }}" alt="Post Image">
            <p class="posted-by">Posted by: {{ $post->user->name }}</p>
            <p class="posted-at">Posted at: {{ $post->created_at->format('d.m.Y H:i') }}</p>
            <div class="special-div">
                <p class="user-details">Name: {{ $post->user->name }}</p>
                <p class="user-details">Last Name: {{ $post->user->lastname }}</p>
                <p class="user-details">Email: {{ $post->user->email }}</p>
            </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@include('partials.footer');

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>