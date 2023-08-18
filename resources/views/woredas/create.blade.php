@extends('layouts.app')

@section('content')

    
            <div class="container">
                <h1>Create Woreda</h1>
        <form action="{{ route('woredas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="subcity_id">Subcity</label>
                <select name="subcity_id" id="subcity_id" class="form-control" required>
                    @foreach ($subcities as $subcity)
                        <option value="{{ $subcity->id }}">{{ $subcity->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
            </div>
@endsection