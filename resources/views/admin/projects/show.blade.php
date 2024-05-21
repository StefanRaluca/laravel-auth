@extends('layouts.admin')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <h2>{{ $project->title }}</h2>

                <img src="{{ $project->image_cover }}" alt="">
            </div>
            <div class="col">
                <h2>{{ $project->title }}</h2>
                <p>{{ $project->description }}</p>

                <button class="btn btn-primary"><a href="{{ route('admin.projects.index') }}"
                        class="text-decoration-none text-white py-3">See All</a>
                </button>
            </div>
        </div>
    </div>

    </div>
@endsection
