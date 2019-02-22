@extends('layout')

@section('titel', 'Receipt')

@section('content')
   {{-- {{dump($data)}} --}}

  <h2>Your booking has been registered</h2>
  {{-- <h3>{{ $room[0]->room_id }}</h3> --}}
  <ul>
    {{-- @foreach ($room as $res)
      <li>{{ $res->res_date }}</li>
    @endforeach --}}

  </ul>

  <a href="{{ route('room.show', $room->id) }}">Go back</a>

@endsection
