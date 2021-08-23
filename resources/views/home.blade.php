@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Movies List') }}: <a href="{{ route('movies.create') }}">New</a>
                    </div>

                    {{-- <div class="card-body"> --}}


                    {{-- {{ __('You are logged in!') }}
                        <example-component></example-component> --}}
                    {{-- </div> --}}



                    <table class="table table-bordered" style="margin-bottom: 0px;">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Movie</th>
                                <th scope="col">Release Date</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($movies as $movie)
                                <tr>
                                    <th scope="row">{{ $movie->id }}</th>
                                    <td>{{ $movie->name }}</td>
                                    <td>{{ $movie->release_date }}</td>
                                    <td>{{ $movie->price }}</td>
                                    <td>
                                        <form role="form" action="{{ route('movies.destroy', $movie) }}" method="post">
                                            {{ method_field('delete') }}
                                            @csrf
                                            <button type="submit" class="btn btn-default" style="color: rgb(192, 77, 77)"><i
                                                    class="fa fa-times"></i>
                                                Delete</button>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Sorry! No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
@endsection
