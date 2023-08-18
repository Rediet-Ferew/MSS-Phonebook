@extends('layouts.app')

@section('content')

    
            <div class="container">
                <h1>Edit Woreda</h1>
        <form action="{{ route('woredas.update', $woreda) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $woreda->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ $woreda->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="subcity_id">Subcity</label>
                <select name="subcity_id" id="subcity_id" class="form-control" required>
                    @foreach ($subcities as $subcity)
                        <option value="{{ $subcity->id }}" {{ $subcity->id == $woreda->subcity_id ? 'selected' : '' }}>{{ $subcity->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
            </div>
@endsection