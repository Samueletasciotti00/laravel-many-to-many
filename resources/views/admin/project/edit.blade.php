@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1>Modifica : {{ $project->title }} </h1>

    <form action="{{route('admin.project.update', $project->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $project->title }}">
        <input type="text" name="description" value="{{ $project->description }}">
        <select class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            @foreach ($data as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>

            @endforeach

        </select>

        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                @foreach($tags as $tag)
                <input type="checkbox" class="btn-check" id="{{ $tag->id }}" autocomplete="off" value="{{ $tag->id }}" name="tags[]">
                <label class="btn btn-outline-primary" for="{{ $tag->id }}">{{ $tag->name }}</label>
                @endforeach
            </div>
        <button type="submit">Update</button>
    </form>
</div>

@endsection