@extends('layouts.app')

@section('content')

    
            <div class="container">
                <h1>Edit City</h1>
        <form action="{{ route('cities.update', $city) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $city->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ $city->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="region_id">Region</label>
                <select name="region_id" id="region_id" class="form-control" required>
                    @foreach ($regions as $region)
                        <option value="{{ $region->id }}" {{ $region->id == $city->region_id ? 'selected' : '' }}>{{ $region->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
            </div>
@endsection