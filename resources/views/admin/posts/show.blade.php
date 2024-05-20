@extends('layouts.admin')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <h2>{{ $post->title }}</h2>

                <img src="{{ $post->image_cover }}" alt="">
            </div>
            <div class="col">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>

                <button class="btn btn-primary"><a href="{{ route('admin.posts.index') }}"
                        class="text-decoration-none text-white py-3">See All</a>
                </button>
            </div>
        </div>
    </div>

    </div>
@endsection
