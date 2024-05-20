@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Edit post</h1>

        <form action="{{ route('admin.posts.update', $post) }}" method="post">

            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Name </label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelper"
                    placeholder="Avatar" value="{{ $post->title }}" />

            </div>

            <div class="mb-3">
                <label for="image_cover" class="form-label">image_cover</label>
                <input type="text" class="form-control" name="image_cover" id="image_cover"
                    aria-describedby="image_coverHelper" placeholder="https://" value="{{ $post->image_cover }}" />

            </div>


            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="9">{{ $post->description }}</textarea>
            </div>


            <button type="submit" class="btn btn-primary" value="Invia">
                Edit
            </button>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back to all </a>



        </form>

    </div>
@endsection
