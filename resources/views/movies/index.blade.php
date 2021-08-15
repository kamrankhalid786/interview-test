@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Movies') }}</div>

                {{-- <div class="card-body"> --}}
                    <div class="uper">
                        @if(session()->get('success'))
                          <div class="alert alert-success">
                            {{ session()->get('success') }}
                          </div><br />
                        @endif
                        <table class="table table-striped">
                          <thead>
                              <tr>
                                <td>ID</td>
                                <td>Game Name</td>
                                <td>Game Price</td>
                                <td colspan="2">Action</td>
                              </tr>
                          </thead>
                          <tbody>
                              {{-- @foreach($games as $game)
                              <tr>
                                  <td>{{$game->id}}</td>
                                  <td>{{$game->name}}</td>
                                  <td>{{$game->price}}</td>
                                  <td><a href="{{ route('games.edit', $game->id)}}" class="btn btn-primary">Edit</a></td>
                                  <td>
                                      <form action="{{ route('games.destroy', $game->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                      </form>
                                  </td>
                              </tr>
                              @endforeach --}}
                          </tbody>
                        </table>
                    <div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>


@endsection
