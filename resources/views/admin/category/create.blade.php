@extends('layouts.app')

@section('content')

<div class="container my-5">
    <h1>Create</h1>

    <form action="{{route('admin.project.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="category_id" class="form-label">NEW CATEGORY NAME</label>
            <input type="text" class="form-control" name="category_id">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>

        <button class="button-17" type="submit">Update</button>
    </form>
</div>

@endsection