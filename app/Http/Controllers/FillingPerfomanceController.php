<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class FillingPerfomanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_index = DB::table('tbl_filling_perfomance')->get();
        return view('FillingPerfomance.index',['data_index'=>$data_index]);
        // $data_index = FillingPerfomance::all(); 
        //artinya SELECT * FROM tbl_test. ngambil tbl_test dari model Pegawai
        // return view('FillingPerfomance.index', compact('data_index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('FillingPerfomance.create-data');
        // $model = new FillingPerfomance;
        // return view('FillingPerfomance.create-data', compact(
        //     'model'
        // ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::insert('insert into tbl_filling_perfomance (
            id_product, no_batch, start_filling, stop_filling, counter_filling)
            values (?,?,?,?,?)',[
                $request->id_product,
                $request->no_batch,
                $request->start_filling,
                $request->stop_filling,
                $request->counter_filling
            ]);
            return redirect()->route('FillingPerfomance.index');

        // $model = new FillingPerfomance;
        // $model->id_product = $request->id_product;
        // $model->no_batch = $request->no_batch;
        // $model->start_filling = $request->start_filling;
        // $model->stop_filling = $request->stop_filling;
        // $model->counter_filling = $request->counter_filling;
        // $model->save();

        // return redirect('index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tampil = DB::table('tbl_filling_perfomance')->where('id_filling_perfomance',$id)->get();
        // dd($tampil);
        return view('FillingPerfomance.show-data',['tampil'=> $tampil]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = DB::table('tbl_filling_perfomance')->where('id_filling_perfomance',$id)->get();
        // dd($edit);
        return view('FillingPerfomance.edit-data',['edit'=> $edit]);
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
        DB::table('tbl_filling_perfomance')
            ->where('id_filling_perfomance', $id) 
            ->update([
                'id_product' => $request->id_product,
                'no_batch' => $request->no_batch,
                'start_filling' => $request->start_filling,
                'stop_filling' => $request->stop_filling,
                'counter_filling'=> $request->counter_filling
            ]);
        return redirect()->route('FillingPerfomance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_filling_perfomance')->where('id_filling_perfomance',$id)->delete();
        return redirect()->route('FillingPerfomance.index');
    }
}