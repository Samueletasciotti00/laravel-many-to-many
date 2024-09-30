@extends('layouts.app')

@section('content')
<h1>Progetti</h1>

<!-- Message -->
@if(session('delete'))
<div>
    {{session('delete')}}
</div>
@endif
<ul>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">IMG</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Description</th>
                <th scope="col">CATEGORY</th>
                <th scope="col">TAG</th>
                <th scope="col">OPTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <th>{{ $project->id }}</th>
                <th>
                    <img class="thumb" src="{{ asset('storage/' . $project->img) }}" alt="{{ $project->img_original_name }}">
                </th>
                <td>{{ $project->title }}</td>
                <td>{{ $project->slug }}</td>
                <td>{{ $project->description }}</td>
                <td><button type="button" class="btn btn-outline-warning">{{ $project->category?->name }}</button>
                </td>

                <!-- FOR else per i TAG -->
                <td>

                    @forelse($project->tags as $tag)
                    <button type="button" class="btn btn-secondary mb-1">
                        {{$tag->name}}
                    </button>
                    @empty

                    @endforelse

                </td>


                <!-- DELETE -->
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.project.show', $project->id) }}">SHOW</a>
                    <a class="btn btn-success" href="{{ route('admin.project.edit', $project->id) }}">MODIFY</a>
                    <form class="d-line" action="{{ route('admin.project.destroy', $project->id) }}" method="POST" onsubmit="return confirm('delete post ?')">
                        @csrf
                        @method('DELETE')
                        <input type="submit" type="submit" value="ELimina" class="btn btn-danger">
                    </form>
                </td>
            </tr>


            @endforeach
        </tbody>
    </table>


</ul>
@endsection