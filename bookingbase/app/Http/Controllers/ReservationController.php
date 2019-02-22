<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;

class ReservationController extends Controller
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
    public function store(Room $room)
    {

      $input = Input::all();
      $input['room_id'] = $room->id;
      $input['bookers_u_id'] = Auth::id();
      $input['rekv_id'] = Auth::id();

      $newResArr = array();
      foreach ( $_POST as $key => $value )
      {
          if ( preg_match('/newRes/', $key) )
          {
              $this_res = $value;
              $newResArr[] = $this_res;
          }
      }

      $data = array();
      for ($i=0; $i < count($newResArr); $i++) {
        print '<br />';
        $resDate = null;
        for ($c=0; $c < 10; $c++) {
          $resDate .= $newResArr[$i][$c];
        }

        $resModule = null;

        for ($c=10; $c < strlen($newResArr[$i]); $c++) {
          $resModule .= $newResArr[$i][$c];
        }

        $dataline = array('room_id'=>$room->id, 'rekv_id'=> $input['rekv_id'], 'res_date'=> $resDate, 'res_module'=> $resModule, 'bookers_u_id'=> $input['bookers_u_id']);

        array_push($data,$dataline);
      }
        dump($data);
        DB::table('reservations')->insert($data); // Query Builder approach
        return view('room.receipt', compact('room'))->with('message', 'Your booking has been registered!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
