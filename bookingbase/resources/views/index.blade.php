@extends('layout')

@section('titel', 'Overview')

@section('content')

<h2>Map</h2>
@include('map')

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
