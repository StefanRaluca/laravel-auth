@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Add a new post</h1>
        @include('partials.error')


        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title </label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    aria-describedby="titleHelper" placeholder="Lorem lorem lorem" value="{{ old('title') }}" />
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>



            <div class="mb-3">
                <label for="image_cover" class="form-label">image_cover</label>
                <input type="text" class="form-control @error('image_cover') is-invalid @enderror" name="image_cover"
                    id="image_cover" aria-describedby="image_coverHelper" placeholder="https://"
                    value="{{ old('image_cover') }}" />
                @error('image_cover')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>



            <div class="mb-3">
                <label for="description" class="form-label @error('description') is-invalid @enderror">Description</label>
                <textarea class="form-control" name="description" id="description" rows="9" value="{{ old('description') }}"></textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">
                Create
            </button>
            <a href="{{ route('admin.posts.index') }}" class="text-decoration-none text-white btn btn-secondary">Back</a>




        </form>

    </div>
@endsection
