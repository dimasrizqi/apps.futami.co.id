@extends('layouts.master')
@section('title','Filling Perfomance')

@section('content')
    <div class="card mt-3 p-4 shadow-sm">
        <div class="table-responsive">
        <a href="{{ url('/FillingPerfomance') }}" class="btn btn-success mb-3">Kembali</a>
        <table class="mt-4 table table-bordered table-md table-hover bg-white text-center">
                <thead>
                <tr>
                    <th>no</th>
                    <th>no produk</th>
                    <th>no batch</th>
                    <th>start filling</th>
                    <th>stop filling</th>
                    <th>counter filling</th>
                </tr>
                </thead>
                <tbody>

                @foreach($tampil as $no => $data_index)
                        <tr>
                            <th>1</th>
                            <th>{{$data_index->id_product}}</th>
                            <th>{{$data_index->no_batch}}</th>
                            <th>{{$data_index->start_filling}}</th>
                            <th>{{$data_index->stop_filling}}</th>
                            <th>{{$data_index->counter_filling}}</th>
                        </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
    </div>

@endsection