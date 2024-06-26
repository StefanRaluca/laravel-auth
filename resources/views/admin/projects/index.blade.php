@extends('layouts.admin')
@section('content')
    <div class="container py-3">
        @include('partials.error')
        @include('partials.message')

        <div class="d-flex justify-content-between align-items-center p-3 bg-dark text-white">
            <h2>Projects</h2>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary m-1">Add a new project</a>
        </div>
        <div class="table-responsive p-1">
            <table class="table table-light table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col" style="width: 20%">Title</th>
                        <th scope="col" style="width: 20%">Slug</th>
                        <th scope="col">Image Cover</th>
                        <th scope="col" style="width: 30%">Description</th>
                        <th scope="col" style="width: 15%">Start Date</th>
                        <th scope="col">Image Preview</th>
                        <th scope="col">Code Snippet</th>
                        <th scope="col">Team Members</th>
                        <th scope="col">Modify</th>


                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr class="">
                            <td scope="row">{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->slug }}</td>
                            {{--  <td>
                                questa non fa vedere le img di faker perchè controlla solo che contenga la stringa uploads per caricare
                                @if (Str::startsWith($project->image_cover, 'uploads/'))
                                    <img width="100" src="{{ asset('storage/' . $project->image_cover) }}"
                                        alt="{{ $project->title }}">
                                @else
                                    Nothing to show
                                @endif
                            </td> --}}
                            <td>
                                @if ($project->image_cover && Str::startsWith($project->image_cover, 'uploads/'))
                                    <img width="100" src="{{ asset('storage/' . $project->image_cover) }}"
                                        alt="{{ $project->title }}">
                                @elseif ($project->image_cover)
                                    <img width="100" src="{{ $project->image_cover }}" alt="{{ $project->title }}">
                                @else
                                    Nothing to show
                                @endif
                            </td>


                            <td>{{ $project->description }}</td>
                            <td>{{ $project->start_date }}</td>
                            <td><img width="60" src="{{ $project->preview_url }}" alt=""></td>
                            <td>{{ $project->url_code }}</td>
                            <td>{{ $project->team_members }}</td>

                            <td><a href="{{ route('admin.projects.show', $project) }}" class="btn btn-dark m-1"><i
                                        class="fa fa-eye" aria-hidden="true"></i></a>

                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-dark  m-1"><i
                                        class="fa fa-pencil" aria-hidden="true"></i></a>


                                @include('partials.form-delete')
                            </td>
                        </tr>

                    @empty

                        <tr class="">
                            <td scope="row" colspan="7">Nothing to show</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $projects->links('pagination::bootstrap-5') }}
    </div>
@endsection
