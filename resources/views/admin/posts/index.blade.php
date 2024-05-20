@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-3">
            <h2>Posts</h2>
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
                            <td>View/Edit/Delete</td>
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
