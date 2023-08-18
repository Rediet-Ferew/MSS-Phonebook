@extends('layouts.app')

@section('content')

    
            <div class="container">
                <h1>Cities</h1>
                <a href="{{ route('cities.create') }}" class="btn btn-primary mb-3">Create City</a>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Region</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $city)
                            <tr>
                                <td>{{ $city->id }}</td>
                                <td>{{ $city->name }}</td>
                                <td>{{ $city->description }}</td>
                                <td>{{ $city->region->name }}</td>
                                <td>
                                    <a href="{{ route('cities.edit', $city) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('cities.destroy', $city) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this city?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
@endsection