@extends('Tadmin.master')

@section('title', 'Transactions')

@section('content')
<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Data Tarik Saldo</h4>
      </div>
      
      <div class="row">
        <form action="/pulls/search" method="GET" class="form-inline mr-auto ml-5">
            <div class="search-element">
              <input class="form-control" type="text" name="keyword" value="{{ old('keyword')}}" placeholder="Search name" aria-label="Search" data-width="250">
              <button class="btn" type="submit"><i class="fas fa-search"></i></button>
              <div class="search-backdrop"></div>
            </div>
          </form>

          <a href="/pulls/create" class="btn btn-primary mr-5">Tarik Saldo</a>

      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tbody><tr>
              {{-- <th>No</th> --}}
              <th>Nama Nasabah</th>
              <th>Jumlah Penarikan</th>
              <th>Tanggal Penarikan</th>
              <th>Action</th>
            </tr>
            @forelse ($pulls as $key => $pull)
                <tr>
                    {{-- <td>{{$pulls->firstItem()+$key}}</td> --}}
                    <td>{{ $pull->name }}</td>
                    <td>Rp. {{ number_format($pull->jumlah)}}</td>
                    <td>{{ $pull->tanggal }}</td>
                    <td>
                        <a href="" class="btn btn-secondary">Detail</a>
                    </td>
                </tr>
            @empty
            <tr>
              <td colspan="5" align="center"><h5>No Transaction</h5></td>
            </tr>
            @endforelse
            
          </tbody>
        </table>
        </div>
      </div>

      <div class="ml-3">
        {{ $pulls->links() }}
      </div>

    </div>
  </div>
@endsection