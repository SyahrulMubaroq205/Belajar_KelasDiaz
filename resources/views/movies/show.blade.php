@extends('app')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('movies.show', $movie->id) }}" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input disabled type="text" class="form-control" id="name" name="name" value="{{ $movie->name }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="mb-3">
                <label for="desc" class="form-label">Deskripsi</label>
                <input disabled type="text" class="form-control" id="desc" name="desc" value="{{ $movie->desc }}">
                @error('desc')
                     <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{$movie->image()}}" class="card-img-top" alt="...">
                  </div>
              </div>
              <div class="mb-3">
                  <a href="{{route('movies.index')}}" class="btn btn-primary">back</a>
              </div>
        </form>
    </div>
@endsection
