<?php

namespace App\Http\Controllers;

use App\Models\Confiq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfiqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show all confiqs on a room
        // ROUTE: room/{room}/confiq
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ROUTE: room/{room}/confiq/create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ROUTE: room/{room}/confiq
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Confiq  $confiq
     * @return \Illuminate\Http\Response
     */
    public function show(Confiq $confiq)
    {
        // ROUTE: room/{room}/confiq/{confiq}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Confiq  $confiq
     * @return \Illuminate\Http\Response
     */
    public function edit(Confiq $confiq)
    {
        // ROUTE: room/{room}/confiq/{confiq}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Confiq  $confiq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Confiq $confiq)
    {
        // ROUTE: room/{room}/confiq/{confiq}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Confiq  $confiq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Confiq $confiq)
    {
        // ROUTE: room/{room}/confiq/{confiq}
    }
}
