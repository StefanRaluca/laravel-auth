@extends('layouts.admin')
@section('content')
    @include('partials.message')
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <div class="card card_show">
                    <h2 class="text-center py-2">{{ $project->title }}</h2>
                    <img src="{{ $project->image_cover }}" class="card-img-top" alt="{{ $project->title }}">

                </div>
            </div>
            <div class="col">
                <div class="card card_show">
                    <div class="card-body">
                        <h2 class="card-title">{{ $project->title }}</h2>
                        <p class="card-text"><strong>Start Date:</strong> {{ $project->start_date }}</p>
                        <p class="card-text"><strong>Team Members:</strong> {{ $project->team_members }}</p>
                        <p class="card-text"><strong>Preview URL:</strong> <a href="{{ $project->preview_url }}"
                                target="_blank">{{ $project->preview_url }}</a></p>
                        <p class="card-text"><strong>Code URL:</strong> <a href="{{ $project->url_code }}"
                                target="_blank">{{ $project->url_code }}</a></p>
                        <p class="card-text"><strong>Description:</strong> {{ $project->description }}</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary"><a href="{{ route('admin.projects.index') }}"
                                class="text-decoration-none text-white py-3">See All</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
