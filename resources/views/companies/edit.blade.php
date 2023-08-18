@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Edit Company</h1>
        <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="cover_image">Cover Image</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control-file" value="{{ $company->cover_image }}>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $company->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $company->phone }}">
            </div>
            <div class="form-group">
                <label for="cat_id">Category</label>
                <select name="cat_id" id="cat_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $company->cat_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ $company->location }}">
            </div>
            <div class="form-group">
                <label for="branch">Branch</label>
                <input type="text" name="branch" id="branch" class="form-control" value="{{ $company->branch }}">
            </div>
            <div class="form-group">
                <label for="city_id">City</label>
                <select name="city_id" id="city_id" class="form-control">
                    <option value="">Select City</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ $city->id == $company->city_id ? 'selected' : '' }}>{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subcity_id">Subcity</label>
                <select name="subcity_id" id="subcity_id" class="form-control">
                    <option value="">Select Subcity</option>
                    @foreach ($subcities as $subcity)
                        <option value="{{ $subcity->id }}" {{ $subcity->id == $company->subcity_id ? 'selected' : '' }}>{{ $subcity->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="woreda_id">Woreda</label>
                <select name="woreda_id" id="woreda_id" class="form-control">
                    <option value="">Select Woreda</option>
                    @foreach ($woredas as $woreda)
                        <option value="{{ $woreda->id }}" {{ $woreda->id == $company->woreda_id ? 'selected' : '' }}>{{ $woreda->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
</div>
@endsection