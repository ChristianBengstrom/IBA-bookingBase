@extends('layout')

@section('titel', 'Receipt')

@section('content')

  <h1>Your booking has been registered for:</h1>
  <h2>Room {{ $data[0]['room_id'] }}</h2>

  <ul>
  @for ($i=0; $i < count($data); $i++)
    <li>{{ 'date: ' . $data[$i]['res_date'] . ' time: ' . $data[$i]['res_module'] . ' - ' . ($data[$i]['res_module']+1) }}</li>
  @endfor
  </ul>

  <a href="{{ route('room.show', $room->id) }}">Go back</a>

@endsection
