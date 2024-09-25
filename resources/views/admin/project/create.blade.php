@extends('layouts.app')

@section('content')

<div class="container my-5">
    <h1>Create</h1>

    <form action="{{route('admin.project.store')}}" method="POST">
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


        <select class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            @foreach ($data as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>

            @endforeach

        </select>
        <button class="button-17" type="submit">Update</button>
    </form>
</div>

@endsection