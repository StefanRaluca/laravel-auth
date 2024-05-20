@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-3">
            <h2>Posts</h2>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary m-1">Add a new post</a>
        </div>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Image Cover</th>
                        <th scope="col">Description</th>
                        <th scope="col">Modify</th>


                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr class="">
                            <td scope="row">{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td><img width="60" src="{{ $post->image_cover }}" alt=""></td>
                            <td>{{ $post->description }}</td>
                            <td><a href="{{ route('admin.posts.show', $post) }}" class="btn btn-dark m-1"><i
                                        class="fa fa-eye" aria-hidden="true"></i></a>

                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-dark  m-1"><i
                                        class="fa fa-pencil" aria-hidden="true"></i></a>
                                <button type="button" class="btn btn-danger  m-1" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $post->id }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>

                                </button>
                                <div class="modal fade" id="modalId-{{ $post->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">
                                                    Attention! Irreversible operation!
                                                    Are sure you want to delete {{ $post->title }} ?
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
                                                <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
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

        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
@endsection
