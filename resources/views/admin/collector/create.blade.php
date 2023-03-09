@extends('Tadmin.master')

@section('title', 'CREATE DATA')

@section('content')
    <form role="form" action="/collectors" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="no_rek">No Rekening</label>
                    <input type="text" class="form-control" id="no_rek" name="no_rek">
                    @error('no_rek')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="nama_pengepul">Nama Pengepul</label>
                    <input type="text" class="form-control" id="nama_pengepul" placeholder="name" name="nama_pengepul">
                </div>
                <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan</label>
                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                </div>
                <div class="form-group">
                    <label for="telp">No Telp</label>
                    <input type="number" class="form-control" id="telp" name="telp">
                </div>

            </div>
        </div>
        <div class="ml-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection