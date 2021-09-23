@extends('layouts.master')
@section('title', 'Tambah Downtime')

@section('content')

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form action="{{ route('downtime.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-uppercase">id produksi</label><br>
                                        <input type="number" placeholder="Masukan id produksi" name="id_produksi" class="form-control @error('id_produksi') is invalid @enderror" value="{{old('id_produksi')}}">
                                        @error('id_produksi')
                                            <div class="alert alert-danger">{{$message="ID Product harus di isi"}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-uppercase">Jenis Downtime</label>
                                        <select class="form-control @error('jenis_downtime') is invalid @enderror" name="id_jenis_downtime" id="jenis_downtime" value="{{old('jenis_downtime')}}">
                                            <option selected>--Pilih Jenis Downtime--</option> 
                                            @foreach ($jenis_downtime as $jenis_downtime)
                                                <option value="{{$jenis_downtime->id}}">{{ $jenis_downtime->nama_jenis_downtime }}</option> 
                                            @endforeach
                                        </select>
                                        @error('jenis_downtime')
                                            <div class="alert alert-danger">{{$message="Jenis Downtime harus di isi"}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-uppercase">Unit Downtime</label><br>
                                        <select class="form-control @error('unit_downtime') is invalid @enderror" name="id_unit_downtime" id="unit_downtime" value="{{old('unit_downtime')}}">
                                            <option selected>--Pilih Unit Downtime--</option> 
                                            @foreach ($unit_downtime as $unit_downtime)
                                                <option value="{{ $unit_downtime->id }}">{{ $unit_downtime->nama_unit_downtime }}</option> 
                                            @endforeach
                                        </select>
                                        @error('unit_downtime')
                                            <div class="alert alert-danger">{{$message="Unit Downtime harus di isi"}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-uppercase">Root Cause</label><br>
                                        <input type="text" placeholder="Masukan Root Cause" name="root_cause" class="form-control @error('root_cause') is invalid @enderror" value="{{old('root_cause')}}">
                                        @error('root_cause')
                                            <div class="alert alert-danger">{{$message="Root Cause harus di isi"}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <div class="form-group">
                                        <label class="text-uppercase">Mulai</label><br>
                                        <input type="datetime-local" name="mulai_downtime" class="form-control @error('mulai_downtime') is invalid @enderror" placeholder="Masukan waktu mulai" value="{{old('mulai_downtime')}}">  
                                        @error('mulai_downtime')
                                            <div class="alert alert-danger">{{$message="Mulai Downtime harus di isi"}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <div class="form-group">
                                        <label class="text-uppercase">Selesai</label><br>
                                        <input type="datetime-local" name="selesai_downtime" class="form-control @error('selesai_downtime') is invalid @enderror" placeholder="Masukan waktu selesai" value="{{old('selesai_downtime')}}">
                                        @error('selesai_downtime')
                                            <div class="alert alert-danger">{{$message="Selesai Downtime harus di isi"}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                </form>
            </div>

        </div>
    </div>
    </div>
@endsection

@push('page-script')

@endpush
