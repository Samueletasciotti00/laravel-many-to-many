@extends('layouts.app')

@section('content')
<h1>Progetti</h1>


<ul>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NAME</th>
                <th scope="col">OPTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td><button type="button" class="btn btn-outline-warning">{{ $category->category?->name }}</button>
                </td>
                
                <!-- DELETE -->
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.category.show', $category->id) }}">SHOW</a>
                    <a class="btn btn-success" href="{{ route('admin.category.edit', $category->id) }}">MODIFY</a>
                    <form class="d-line" action="{{ route('admin.category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('delete post ?')">
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