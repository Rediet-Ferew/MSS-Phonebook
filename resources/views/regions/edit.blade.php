@extends('layouts.app')

@section('content')
<div class="container">


<h1>Edit Region</h1>
<form action="{{ route('regions.update', $region->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <label for="description">description</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $region->name }}">
        <textarea name="description" id="description" cols="50" rows="3">{{ $region->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

</div>
@endsection