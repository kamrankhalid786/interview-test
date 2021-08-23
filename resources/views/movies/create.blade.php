@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('New Movie') }} / <a href="{{ route('movies.index') }}">Cancel</a>
                    </div>
                    <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                        action="{{ route('movies.store') }}" style="padding: 15px;">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Movie name" required>
                        </div>
                        <div>
                            <label for="release_date">Release Date</label>
                            <input type="date" class="form-control" id="release_date" name="release_date"
                                placeholder="Enter release date" required>
                        </div>
                        <div>
                            <label for="price">Price</label>
                            <input type="nubmber" class="form-control" id="price" name="price"
                                placeholder="Enter price in AED" required>
                        </div>
                        <div>
                            <label for="country_name">Country</label>
                            <input type="nubmber" class="form-control" id="country_name" name="country_name"
                                placeholder="Enter country name" required>
                        </div>
                        <div>
                            <label for="photo">Photo</label>
                            <input type="nubmber" class="form-control" id="photo" name="photo" placeholder="Upload photo"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="genres">Genres</label>
                            <select multiple class="form-control" id="genres" name="genres">
                                @foreach (config('common.movies_genres') as $genres_key => $genres_name)
                                    <option value="{{ $genres_key }}">{{ $genres_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
