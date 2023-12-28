@extends('layouts.app')

{{-- @section('title', 'Home Package') --}}

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Package</h1>
        <a href="{{ route('packages.create') }}" class="btn btn-primary">Add Package</a>
    </div>
    <hr/>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Package Code</th>
                <th class="text-center">Description</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($package->count() > 0)
                @foreach($package as $pkg)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $pkg->title }}</td>
                        <td class="align-middle">{{ $pkg->price }}</td>
                        <td class="align-middle">{{ $pkg->package_code }}</td>
                        <td class="align-middle">{{ $pkg->description }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('packages.show', $pkg->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('packages.edit', $pkg->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('packages.destroy', $pkg->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Package not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
