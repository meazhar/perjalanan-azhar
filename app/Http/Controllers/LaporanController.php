<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Http\Requests\StoreLaporanRequest;
use App\Http\Requests\UpdateLaporanRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;
use App\Imports\LaporanImport;
// use App\Imports\ExcelImport;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['laporan'] = Laporan::paginate(5);
        return view('laporan.index',
        [
            "title" => "Laporan Bug"
        ])->with($data);
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
     * @param  \App\Http\Requests\StoreLaporanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLaporanRequest $request)
    {
        Laporan::create($request->all());

        return redirect('laporan')->with('success', 'Laporan berhasil ditambahkan!');

        // $laporan = Laporan::paginate;
        // return view('laporan.index', compact('laporan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLaporanRequest  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLaporanRequest $request, Laporan $laporan)
    {
        $laporan->update($request->all());
        return redirect('laporan')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        laporan::destroy($laporan->id);
        // $laporan->delete();
        return redirect('laporan')->with('success', 'Data berhasil dihapus');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new LaporanExport, $date.'_laporan.xlsx');
    }

    public function importData()
    {
        Excel::import(new LaporanImport, request()->file('import'));
        return redirect('/laporan')->with('succes', 'import data berhasil');
    }
}
