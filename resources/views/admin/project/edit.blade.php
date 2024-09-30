@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1><span class="text-danger">Modifica : </span>{{ $project->title }} </h1>

    <form action="{{route('admin.project.update', $project->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title Edit -->
        <label for="title">TITLE</label>
        <input class="d-block m-2" type="text" name="title" value="{{ $project->title }}">

        <!-- Description Edit -->
        <label for="title">DESCRIPTION</label>
        <input class="d-block m-2" type="text" name="description" value="{{ $project->description }}">

        <select class="form-select m-2 border border-primary" aria-label="Default select example" name="category_id">
            <option value="" disabled selected>Open this select menu</option>
            @foreach ($data as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>

            @endforeach

        </select>

        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
            @foreach($tags as $tag)
            <input type="checkbox" class="btn-check" id="{{ $tag->id }}" autocomplete="off" value="{{ $tag->id }}" name="tags[]" @if(in_array($tag->id, $selectedTags)) checked @endif>
            <label class="btn btn-outline-primary" for="{{ $tag->id }}">{{ $tag->name }}</label>
            @endforeach
        </div>


        <div>
            <label for="file">Carica immagine</label>
            <input class="form-control" type="file" name="img" id="formFile">
        </div>

        <div>
            <img src="{{ asset('storage/' . $project->img) }}" alt="">
        </div>
        <button type="submit">Update</button>
    </form>
</div>

@endsection