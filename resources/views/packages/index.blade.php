@extends('layouts.app')

@section('content')

            <div class="container">
                <h1>Packages</h1>
        <a href="{{ route('packages.create') }}" class="btn btn-primary mb-3">Create Package</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Package Term</th>
                    <th>Package Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $package)
                    <tr>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->description }}</td>
                        <td>{{ $package->package_term }}</td>
                        <td>{{ $package->package_price }}</td>
                        <td>
                            {{-- <a href="{{ route('packages.show', $package) }}" class="btn btn-primary">View</a> --}}
                            <a href="{{ route('packages.edit', $package) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('packages.destroy', $package) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this package?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            </div>
@endsection