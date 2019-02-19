@extends('layout')

@section('titel', 'Overview')

@section('content')
<h1>Rooms</h1>

@if ( !$rooms->count() )
    You have no rooms
@else
      @foreach( $rooms as $room )
                  {{-- <a href="{{ route('projects.show', $room->id) }}">{{ $room->id }}</a> --}}

                  <a href="{{ route('room.show', $room->id) }}">
                        <p>{{ $room->type }}-{{ $room->id }}</p>
                  </a>
      @endforeach
@endif

{{-- @foreach ($rooms as $room)
      <a href="{{ route('country.show', $country->id) }}">
            <p>{{ $country->name }}</p>
      </a>
@endforeach --}}



@endsection
