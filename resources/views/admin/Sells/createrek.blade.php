@extends('Tadmin.master')

@section('title', 'TRANSAKSI')

@section('content')
    <form role="form" action="/sells/{{$collector->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item">No Rekening  : <h5>{{$collector->no_rek}}</h5></li>
              <li class="list-group-item">Nama Pengepul : <h5>{{$collector->nama_pengepul}}</h5></li>
            </ul>
          </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="trash">Pilih Sampah</label>
                    <select name="trash_id" id="trash" class="form-control">
                      <option value="">PILIH</option>
                    @foreach ($trashes as $trash)
                      @if ($trash->jumlah>0)
                      <option value="{{ $trash->id}}">{{$trash->nama_sampah}} (Rp. {{number_format($trash->harga_sampah)}}) - 
                        Stok : {{$trash->jumlah}}</option>  
                      @else
                        
                      @endif

                    @endforeach
                    </select>
                </div>
            
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah">
                </div>
            </div>
        </div>

        <div class="ml-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
