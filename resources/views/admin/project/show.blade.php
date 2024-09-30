@extends('layouts.app')

@section('content')
<div class="containte my-5 text-center">
<h1>Info</h1>

<h2><span class="text-danger">Nome Progetto :</span> {{ $project->title }}</h2>
<h4><span class="text-danger">ID : </span>{{ $project->id }}</h4>
<h4><span class="text-danger">SLUG : </span>{{ $project->slug }}</h4>
<h4><span class="text-danger">Description :  </span>{{ $project->description }}</h4>

<div>
    <img src="{{ asset('storage' . $project->img) }}" alt="{{ $project->img_original_name }}">
</div>
</div>
@endsection