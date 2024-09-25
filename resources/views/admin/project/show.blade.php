@extends('layouts.app')

@section('content')
<h1>Info Progetto</h1>

<h2>{{ $project->title }}</h2>
<h4>{{ $project->title }}</h4>
<h4>{{ $project->slug }}</h4>
<h4>{{ $project->description }}</h4>
@endsection