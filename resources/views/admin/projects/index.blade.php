@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-3">
            <h2>Projects</h2>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary m-1">Add a new project</a>
        </div>
        <div class="table-responsive">
            <table class="table table-primary">
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
                            <td><img width="60" src="{{ $project->image_cover }}" alt=""></td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->start_date }}</td>
                            <td><img width="60" src="{{ $project->preview_url }}" alt=""></td>
                            <td>{{ $project->url_code }}</td>
                            <td>{{ $project->team_members }}</td>
                            <td><a href="{{ route('admin.projects.show', $project) }}" class="btn btn-dark m-1"><i
                                        class="fa fa-eye" aria-hidden="true"></i></a>

                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-dark  m-1"><i
                                        class="fa fa-pencil" aria-hidden="true"></i></a>
                                <button type="button" class="btn btn-danger  m-1" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $project->id }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>

                                </button>
                                <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">
                                                    Attention! Irreversible operation!
                                                    Are sure you want to delete {{ $project->title }} ?
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">This is an irreversible operation.
                                                Are you sure you want to run it?</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <form action="{{ route('admin.projects.destroy', $project) }}"
                                                    method="project">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        Confirm
                                                    </button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
