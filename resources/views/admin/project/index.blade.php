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
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Description</th>
                <th scope="col">TYPE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <th scope="row">{{ $project->id }}</th>
                <td>{{ $project->title }}</td>
                <td>{{ $project->slug }}</td>
                <td>{{ $project->description }}</td>
                <td><button type="button" class="btn btn-outline-warning">{{ $project->category?->name }}</button>
                </td>
                <td><a class="btn btn-primary" href="{{ route('admin.project.show', $project->id) }}">SHOW</a></td>
                <td><a class="btn btn-success" href="{{ route('admin.project.edit', $project->id) }}">MODIFY</a></td>

                <!-- DELETE -->
                <td>
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