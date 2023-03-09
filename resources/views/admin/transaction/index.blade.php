@extends('Tadmin.master')

@section('title', 'Transactions')

@section('content')
<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Data Transaction</h4>
      </div>
      
      <div class="row">
        <form action="/transactions/search" method="GET" class="form-inline mr-auto ml-5">
            <div class="search-element">
              <input class="form-control" type="text" name="keyword" value="{{ old('keyword')}}" placeholder="Search name" aria-label="Search" data-width="250">
              <button class="btn" type="submit"><i class="fas fa-search"></i></button>
              <div class="search-backdrop"></div>
            </div>
          </form>

          <a href="/transactions/create" class="btn btn-primary mr-5">Jual Sampah</a>

      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tbody><tr>
              {{-- <th>No</th> --}}
              <th>Nama Nasabah</th>
              <th>Jumlah Sampah/Kilogram</th>
              <th>Tgl Setor</th>
              <th>Petugas</th>
              <th>Action</th>
            </tr>
            @forelse ($transactions as $key => $transaction)
                <tr>
                    {{-- <td>{{$trashes->firstItem()+$key}}</td> --}}
                    <td>{{ $transaction->name }}</td>
                    <td>{{ $transaction->jumlah }} Kilogram</td>
                    <td>{{ $transaction->tanggal }}</td>
                    <td>{{ $transaction->nameAdmin }}</td>
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
        {{ $transactions->links() }}
      </div>

    </div>
  </div>
@endsection