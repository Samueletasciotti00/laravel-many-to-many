@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1>Modifica : {{ $project->title }} </h1>

    <form action="{{route('admin.project.update', $project->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $project->title }}">
        <input type="text" name="description" value="{{ $project->description }}">
        
        <button type="submit">Update</button>
    </form>
</div>

@endsection