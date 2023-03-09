@extends('Tadmin.master')

@section('title', 'Collector')

@section('content')
<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Data Pengepul</h4>
      </div>

      <div class="row">
        <form action="/collectors/search" method="GET" class="form-inline mr-auto ml-5">
            <div class="search-element">
              <input class="form-control" type="text" name="keyword" value="{{ old('keyword')}}" placeholder="Search name" aria-label="Search" data-width="250">
              <button class="btn" type="submit"><i class="fas fa-search"></i></button>
              <div class="search-backdrop"></div>
            </div>
          </form>

          <a href="/collectors/create" class="btn btn-primary mr-5">Tambah</a>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tbody><tr>
              {{-- <th>No</th> --}}
              <th>Nama Pengepul</th>
              <th>No Rekening</th>
              <th>Nama Perusahaan</th>
              <th>Alamat</th>
              <th>Telpon</th>
              <th>Action</th>
            </tr>
            @forelse ($collectors as $key => $collector)
                <tr>
                    {{-- <td>{{$trashes->firstItem()+$key}}</td> --}}
                    <td>{{ $collector->nama_pengepul }}</td>
                    <td>{{ $collector->no_rek }}</td>
                    <td>{{ $collector->nama_perusahaan }}</td>
                    <td>{{ $collector->alamat }}</td>
                    <td>{{ $collector->telp }}</td>
                    <td>
                        <a href="/collectors/{{$collector->id}}/edit" class="btn btn-secondary">Edit</a>
                        <a href="/collectors/{{$collector->id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @empty
            <tr>
              <td colspan="6" align="center"><h5>No Collectors</h5></td>
            </tr>
            @endforelse
            
          </tbody>
        </table>
        </div>
      </div>

      <div class="ml-3">
        {{ $collectors->links() }}
      </div>

    </div>
  </div>
@endsection