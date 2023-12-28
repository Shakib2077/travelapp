@extends('layouts.app')

@section('title', 'Edit Package')

@section('contents')
    <h1 class="mb-0">Edit Package</h1>
    <hr />
    <form action="{{ route('packages.update', $package->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $package->title }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $package->price }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Package Code</label>
                <input type="text" name="package_code" class="form-control" placeholder="Package Code" value="{{ $package->package_code }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Description">{{ $package->description }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-danger">Update</button>
            </div>
        </div>
    </form>
@endsection
