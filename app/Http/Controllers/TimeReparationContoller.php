<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimeReparationContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_table = DB::table('tbl_time_reparation')->get();
        return view ('TimeReparation.index', ['data_table'=> $data_table]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TimeReparation.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::insert('insert into tbl_time_reparation (
            id_product,
            start,
            stop) 
            values (?,?,?)', [
            $request->id_product,
            $request->start,
            $request->stop]);
        return redirect()->route('TimeReparation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tampil = DB::table('tbl_time_reparation')->where('id_time_reparation',$id)->get();
        // dd($tampil);
        return view('TimeReparation.tampil',['tampil'=> $tampil]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = DB::table('tbl_time_reparation')->where('id_time_reparation',$id)->get();
        // dd($edit);
        return view('TimeReparation.edit',['edit'=> $edit]);
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
        // dd($request);
        DB::table('tbl_time_reparation')
            ->where('id_time_reparation', $id) 
            ->update([
                'id_product' => $request->id_product,
                'start' => $request->start,
                'stop' => $request->stop
            ]);
        return redirect()->route('TimeReparation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_time_reparation')->where('id_time_reparation',$id)->delete();
        return redirect()->route('TimeReparation.index');
    }
}