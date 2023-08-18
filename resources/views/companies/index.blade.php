@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Companies</h1>
        <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Create Company</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cover Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Phone Number</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Branch</th>
                    <th>City</th>
                    <th>Subcity</th>
                    <th>Woreda</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->cover_image }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->description }}</td>
                        <td>{{ $company->phone }}</td>
                        <td>{{ $company->category->name }}</td>
                        <td>{{ $company->location }}</td>
                        <td>{{ $company->branch }}</td>
                        <td>{{ $company->city->name }}</td>
                        <td>{{ $company->subcity->name }}</td>
                        <td>{{ $company->woreda->name }}</td>
                        <td>
                            <a href="{{ route('companies.show', $company) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('companies.edit', $company) }}" class="btn btn-secondary">Edit</a>
                            
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
</div>
@endsection