@extends('layouts.app')

@section('content')

            <div class="container">
                <h1>Edit Package</h1>
        <form action="{{ route('packages.update', $package) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $package->name }}" required>
            </div>
            <div class="form-group">
                <label for="term">Term</label>
                <select name="package_term" id="term" class="form-control" required>
                    <option value="monthly" {{ $package->term == 'monthly' ? 'selected' : '' }}>Monthly</option>
                    <option value="three_monthly" {{ $package->term == 'three_monthly' ? 'selected' : '' }}>Three Monthly</option>
                    <option value="six_monthly" {{ $package->term == 'six_monthly' ? 'selected' : '' }}>Six Monthly</option>
                    <option value="yearly" {{ $package->term == 'yearly' ? 'selected' : '' }}>Yearly</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="package_price" id="price" class="form-control" value="{{ $package->package_price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
            </div>
@endsection