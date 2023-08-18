@extends('layouts.app')

@section('content')

    
            <div class="container">
                <h1>Edit Subcity</h1>
        <form action="{{ route('subcities.update', $subcity) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $subcity->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ $subcity->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="city_id">City</label>
                <select name="city_id" id="city_id" class="form-control" required>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ $city->id == $subcity->city_id ? 'selected' : '' }}>{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
            </div>
@endsection