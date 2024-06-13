@extends('app')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('movies.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="mb-3">
                <label for="desc" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="desc" name="desc">
                @error('desc')
                     <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                     <small class="text-danger">{{ $message }}</small>
                 @enderror
              </div>
              <div class="mb-3">
                  <button type="submit" class="btn btn-primary">Save</button>
              </div>
        </form>
    </div>
@endsection
