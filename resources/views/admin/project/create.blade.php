@extends('layouts.app')

@section('content')

<div class="container my-5">
    <h1>Create</h1>

    <form action="{{route('admin.project.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" name="description">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>

        <div class="mb-3">
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                @foreach($tags as $tag)
                <input type="checkbox" class="btn-check" id="{{ $tag->id }}" autocomplete="off" value="{{ $tag->id }}" name="tags[]">
                <label class="btn btn-outline-primary" for="{{ $tag->id }}">{{ $tag->name }}</label>
                @endforeach
            </div>
        </div>


        <select class="form-select" aria-label="Default select example" name="category_id">
            <option selected>Open this select menu</option>
            @foreach ($data as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>

            @endforeach

        </select>

        <label for="file">Carica immagine</label>
        <input type="file" name="img" onchange="showImage(event)">

        <div>
            <img id="thumb" class="thumb" src="/img/placeholder-img.jpg" alt="">
        </div>
        <button class="button-17" type="submit">Update</button>
    </form>
</div>


<script>
    function showImage(event) {
       const thumb = document.getElementById('thumb');
       thumb.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection