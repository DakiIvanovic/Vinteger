@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>All Posts</h1>
                @foreach ($posts as $post)
                    <div class="post">
                        <h2>{{ $post->title }}</h2>
                        <p>{{ $post->description }}</p>
                        <p>Posted by: {{ $post->user->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
