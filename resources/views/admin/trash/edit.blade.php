@extends('Tadmin.master')

@section('title', 'EDIT DATA')

@section('content')
    <form role="form" action="/trash/{{$trash->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Sampah</label>
                    <input type="text" class="form-control" name="nama_sampah" value="{{ old('nama_sampah', $trash->nama_sampah)}}">
                </div>
                <div class="form-group">
                    <label>Harga Sampah</label>
                    <input type="text" class="form-control" placeholder="Rp." name="harga_sampah" value="{{ old('harga_sampah', $trash->harga_sampah)}}">
                </div>
            </div>
        </div>
        <div class="ml-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection