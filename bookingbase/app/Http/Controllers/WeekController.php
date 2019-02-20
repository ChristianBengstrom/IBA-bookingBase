<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Room;
// use App\Models\Week;

class WeekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Room $room
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room, $id)
    {

      $year = date("Y"); // Year 2010
      if ($id <= 9) {
        $week = "0" . $id;
      } else {
        $week = $id;
      };

      $date1 = date( "Y-m-d", strtotime($year."W".$week."0") ); // First day of week
      $date2 = date( "Y-m-d", strtotime($year."W".$week."5") ); // Last day of week
      // echo $date1 . " - " . $date2;

        $room_resavations = DB::table('reservations')
            ->join('rooms', 'id', '=', 'reservations.room_id')
            ->select('rooms.*', 'reservations.*')
            ->where('rooms.id', '=', $room->id)
            ->where('reservations.res_date', '>', $date1)
            ->where('reservations.res_date', '<', $date2)
            ->get();

        if (!$room_resavations->count()) {
            $room->{"now_week"} = $id;
            $room->{"has_reservations"} = false;
            $room->{"week_start_date"} = $date1;

            return view('room.show', compact('room'));
        } else {
            $room = $room_resavations;
            $room[0]->{"now_week"} = $id;
            $room[0]->{"week_start_date"} = $date1;
            $room[0]->{"has_reservations"} = true;

            return view('room.show', compact('room'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
