@extends('layouts.app')

@section('content')

    
            <div class="container">
                <h1>Subcities</h1>
                <a href="{{ route('subcities.create') }}" class="btn btn-primary mb-3">Create Subcity</a>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>City</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcities as $subcity)
                            <tr>
                                <td>{{ $subcity->id }}</td>
                                <td>{{ $subcity->name }}</td>
                                <td>{{ $subcity->description }}</td>
                                <td>{{ $subcity->city->name }}</td>
                                <td>
                                    <a href="{{ route('subcities.edit', $subcity) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('subcities.destroy', $subcity) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this subcity?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
@endsection