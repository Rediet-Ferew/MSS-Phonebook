@extends('layouts.app')

@section('content')

    
            <div class="container">
                <h1>Woredas</h1>
        <a href="{{ route('woredas.create') }}" class="btn btn-primary mb-3">Create Woreda</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Subcity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($woredas as $woreda)
                    <tr>
                        <td>{{ $woreda->name }}</td>
                        <td>{{ $woreda->description }}</td>
                        <td>{{ $woreda->subcity->name }}</td>
                        <td>
                            {{-- <a href="{{ route('woredas.show', $woreda) }}" class="btn btn-primary">View</a> --}}
                            <a href="{{ route('woredas.edit', $woreda) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('woredas.destroy', $woreda) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this woreda?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            </div>
@endsection