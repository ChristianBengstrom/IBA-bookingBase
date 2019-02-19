@extends('layout')

@section('titel', 'Schedule')

@section('js')
      <script src="{{ URL::asset('js/scheme.js') }}" charset="utf-8"></script>
@stop

@section('content')

  @if ( isset($room[0]->has_reservations) )
      @php
        $r = $room[0];
        $res_json= [];
      @endphp

      @foreach ($room as $res)
        <p>Schedule for: <em>{{ $res->res_date }}-{{ $res->res_module }}</em></p>
        @php
          array_push($res_json,$res)
        @endphp
      @endforeach

      <script type="text/javascript">
        let resObj = @php echo json_encode($res_json, JSON_PRETTY_PRINT); @endphp;
      </script>
  @else
      @php
        $r = $room;
      @endphp
      <p>No reservations registered</p>
  @endif

  <h1>Schedule for: <em>{{ $r->type }}-{{ $r->id }}</em></h1>


  <table class="scheme">
  <caption>
    <a href="{{ route('room.week.show', [$r->id, $r->now_week-1])  }}"><<</a>
    Week: {{ $r->now_week }}
    <a href="{{ route('room.week.show', [$r->id, $r->now_week+1])  }}">>></a>
  </caption>
  <colgroup>
    <col class="span1" span="1" style="background-color:gray">
    <col class="span2" span="5" style="background-color:#f1f1f1">
  </colgroup>
  <tr style="background-color:gray">
    <th>Time</th>
    <th>Monday</th>
    <th>Tuesday</th>
    <th>Wednesday</th>
    <th>Thursday</th>
    <th>Friday</th>
  </tr>
  <tr>
    <td>8-9</td>
    <td class="{{ $r->week_start_date }} 8"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +1 days'))}} 8"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +2 days'))}} 8"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +3 days'))}} 8"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +4 days'))}} 8"></td>
  </tr>
  <tr>
    <td>9-10</td>
    <td class="{{ $r->week_start_date }} 9"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +1 days'))}} 9"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +2 days'))}} 9"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +3 days'))}} 9"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +4 days'))}} 9"></td>
  </tr>
  <tr>
    <td>10-11</td>
    <td class="{{ $r->week_start_date }} 10"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +1 days'))}} 10"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +2 days'))}} 10"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +3 days'))}} 10"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +4 days'))}} 10"></td>
  </tr>
  <tr>
    <td>11-12</td>
    <td class="{{ $r->week_start_date }} 11"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +1 days'))}} 11"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +2 days'))}} 11"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +3 days'))}} 11"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +4 days'))}} 11"></td>
  </tr>
  <tr>
    <td>12-13</td>
    <td class="{{ $r->week_start_date }} 12"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +1 days'))}} 12"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +2 days'))}} 12"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +3 days'))}} 12"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +4 days'))}} 12"></td>
  </tr>
  <tr>
    <td>13-14</td>
    <td class="{{ $r->week_start_date }} 13"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +1 days'))}} 13"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +2 days'))}} 13"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +3 days'))}} 13"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +4 days'))}} 13"></td>
  </tr>
  <tr>
    <td>14-15</td>
    <td class="{{ $r->week_start_date }}14"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +1 days'))}}14"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +2 days'))}}14"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +3 days'))}}14"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +4 days'))}}14"></td>
  </tr>
  <tr>
    <td>15-16</td>
    <td class="{{ $r->week_start_date }} 15"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +1 days'))}} 15"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +2 days'))}} 15"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +3 days'))}} 15"></td>
    <td class="{{ date('Y-m-d', strtotime($r->week_start_date. ' +4 days'))}} 15"></td>
  </tr>
</table>


@endsection
