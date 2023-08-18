@extends('layouts.app')

@section('content')

    <div class="container">
    <h1>Create Region</h1>
    <form action="{{ route('regions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <label for="description">description</label>
            <input type="text" name="name" id="name" class="form-control">
            <textarea name="description" id="description" cols="50" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

</div>
@endsection