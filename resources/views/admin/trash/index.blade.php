@extends('Tadmin.master')

@section('title', 'Trash')

@section('content')
<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Data Sampah</h4>
      </div>
      
      <div class="row">
        <form action="/trash/search" method="GET" class="form-inline mr-auto ml-5">
            <div class="search-element">
              <input class="form-control" type="text" name="keyword" value="{{ old('keyword')}}" placeholder="Search name" aria-label="Search" data-width="250">
              <button class="btn" type="submit"><i class="fas fa-search"></i></button>
              <div class="search-backdrop"></div>
            </div>
          </form>
          
            <a href="/trash/create" class="btn btn-primary mr-5">Tambah</a>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tbody><tr>
              {{-- <th>No</th> --}}
              <th>Nama Sampah</th>
              <th>Harga Sampah</th>
              <th>Action</th>
            </tr>
            @forelse ($trashes as $key => $trash)
                <tr>
                    {{-- <td>{{$trashes->firstItem()+$key}}</td> --}}
                    <td>{{ $trash->nama_sampah }}</td>
                    <td>Rp. {{ number_format($trash->harga_sampah) }}</td>
                    <td>
                        <a href="/trash/{{$trash->id}}/edit" class="btn btn-secondary">Edit</a>
                        <a href="/trash/{{$trash->id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @empty
            <tr>
              <td colspan="3" align="center"><h5>No Trash</h5></td>
            </tr>
            @endforelse
            
          </tbody>
        </table>
        </div>
      </div>

      <div class="ml-3">
        {{ $trashes->links() }}
      </div>

    </div>
  </div>
@endsection