@extends('layouts.app')

@section('content')

            <div class="container">
                <h1>Create Package</h1>
        <form action="{{ route('packages.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="term">Term</label>
                <select name="package_term" id="term" class="form-control" required>
                    <option value="monthly">Monthly</option>
                    <option value="three_monthly">Three Monthly</option>
                    <option value="six_monthly">Six Monthly</option>
                    <option value="yearly">Yearly</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="package_price" id="price" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
            </div>
@endsection