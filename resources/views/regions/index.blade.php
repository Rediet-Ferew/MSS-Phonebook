@extends('layouts.app')

@section('content')
<div class="container">    
        <h1>Regions</h1>
        <a href="{{ route('regions.create') }}" class="btn btn-primary">Create Region</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($regions as $region)
                    <tr>
                        <td>{{ $region->id }}</td>
                        <td>{{ $region->name }}</td>
                        <td>{{ $region->description }}</td>
                        <td>
                            <a href="{{ route('regions.edit', $region->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('regions.destroy', $region->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    

</div>
@endsection