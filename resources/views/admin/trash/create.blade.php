@extends('Tadmin.master')

@section('title', 'CREATE DATA')

@section('content')
    <form role="form" action="/trash" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Sampah</label>
                    <input type="text" class="form-control" name="nama_sampah">
                    @error('nama_sampah')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="text" class="form-control" name="jumlah">
                    @error('jumlah')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="harga_sampah">Harga Sampah</label>
                    <input type="text" class="form-control" placeholder="Rp." id="harga_sampah" name="harga_sampah">
                </div>
            </div>
        </div>
        <div class="ml-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection