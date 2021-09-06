<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class quantityProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_quantityProduction = DB::table('tbl_quantity_production')->get();
        return view('quantity-production.index',['data_quantityProduction'=> $data_quantityProduction]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quantity-production.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::insert('insert into tbl_quantity_production (
            id_product,
            reject_defect,
            sample,
            reject_defect_hci) 
            values (?,?,?,?)', [
            $request->id_product,
            $request->reject_defect,
            $request->sample,
            $request->reject_defect_hci
            ]);
        return redirect()->route('quantity-production.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tampil = DB::table('tbl_quantity_production')->where('id_quantity_production', $id)->get();
        return view('quantity-production.tampil',['tampil'=> $tampil]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = DB::table('tbl_quantity_production')->where('id_quantity_production',$id)->get();
        return view('quantity-production.edit',['edit'=> $edit]);
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
        DB::table('tbl_quantity_production')
            ->where('id_quantity_production', $id) 
            ->update([
                'id_product' => $request->id_product,
                'reject_defect' => $request->reject_defect,
                'sample' => $request->sample,
                'reject_defect_hci' => $request->reject_defect_hci
            ]);
        return redirect()->route('quantity-production.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_quantity_production')->where('id_quantity_production',$id)->delete();
        return redirect()->route('quantity-production.index');
    }
}