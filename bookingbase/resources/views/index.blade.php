@extends('layout')

@section('titel', 'Overview')

@section('content')

<div class="container">
      <div class="row">
            <div class="col-lg-12 mt-5">
                 <h2 class="bg-light p-2 center text-secondary">Map</h2>
                 <p class="p-2 text-secondary">Please choose a room to book and configure.</p>
            </div>
      </div>
      <div class="row">

            <div class="col-lg-8 offset-lg-2">
                  @include('map')
            </div>
      </div>
</div>

{{-- <h2>Rooms</h2>

@if ( !$rooms->count() )
    You have no rooms
@else
      @foreach( $rooms as $room )
                  <a href="{{ route('room.show', $room->id) }}">
                        <p>{{ $room->type }}-{{ $room->id }}</p>
                  </a>
      @endforeach
@endif --}}

@endsection
