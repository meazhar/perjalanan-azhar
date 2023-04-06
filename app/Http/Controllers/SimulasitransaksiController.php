<?php

namespace App\Http\Controllers;

use App\Models\Simulasitransaksi;
use App\Http\Requests\StoreSimulasitransaksiRequest;
use App\Http\Requests\UpdateSimulasitransaksiRequest;

class SimulasitransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('transaksi.index',
    ["title" => "Simulasi Transaksi"]
);
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
     * @param  \App\Http\Requests\StoreSimulasitransaksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSimulasitransaksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Simulasitransaksi  $simulasitransaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Simulasitransaksi $simulasitransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Simulasitransaksi  $simulasitransaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Simulasitransaksi $simulasitransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSimulasitransaksiRequest  $request
     * @param  \App\Models\Simulasitransaksi  $simulasitransaksi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSimulasitransaksiRequest $request, Simulasitransaksi $simulasitransaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Simulasitransaksi  $simulasitransaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Simulasitransaksi $simulasitransaksi)
    {
        //
    }
}
