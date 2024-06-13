@extends('app')

@section('content')
    <div class="row row-cols-3 mt-5">
        @forelse ($movies as $movie)
            <div class="col">

                <div class="card" style="width: 18rem;">
                    <img src="{{ $movie->image() }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->name }}</h5>
                        <p class="card-text">{{ $movie->desc }}</p>
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('movies.destroy', $movie->id) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            <div class="col">
                                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-success">edit</a>
                            </div>
                            <div class="col">
                                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-secondary">show</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div>data belum ada!</div>
        @endforelse
    </div>
@endsection
