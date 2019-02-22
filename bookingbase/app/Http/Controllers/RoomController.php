<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Room;

// use Illuminate\Support\Facades\Input;
// use Redirect;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rooms = Room::all();
      return view('index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
      // // calc now week start date
      $now_week = now()->weekOfYear;

      $year = date("Y"); // Year 2010
      $week = "0" . $now_week;

      $date1 = date( "Y-m-d", strtotime($year."W".$week."0") ); // First day of week
      $date2 = date( "Y-m-d", strtotime($year."W".$week."5") ); // Last day of week
      // echo $date1 . " - " . $date2;

        $room_resavations = DB::table('reservations as r')
            ->join('rooms', 'id', '=', 'r.room_id')
            ->join('users as u', 'u.id', '=', 'r.rekv_id')
            ->select('rooms.id', 'rooms.type', 'r.res_date', 'r.res_module', 'u.id as uid', 'u.name')
            ->where('rooms.id', '=', $room->id)
            ->where('r.res_date', '>', $date1)
            ->where('r.res_date', '<', $date2)
            ->get();

        if (!$room_resavations->count()) {
            $room->{"now_week"} = $now_week;
            $room->{"has_reservations"} = false;
            $room->{"week_start_date"} = $date1;

            return view('room.show', compact('room'));
        } else {
            $room = $room_resavations;
            $room[0]->{"now_week"} = $now_week;
            $room[0]->{"week_start_date"} = $date1;
            $room[0]->{"has_reservations"} = true;

            // dump($room);
            return view('room.show', compact('room'));
        }
    }

    /**
     * Show the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
