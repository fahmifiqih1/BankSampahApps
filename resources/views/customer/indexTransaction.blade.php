@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">History</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                          <tr>
                            {{-- <th scope="col">#</th> --}}
                            <th scope="col">Sampah</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">jumlah</th>
                            <th scope="col">Tanggal</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $key => $transaction)
                            <tr>
                              {{-- <th scope="row">{{$key+1}}</th> --}}
                              <td>{{$transaction->trash->nama_sampah}}</td>
                              <td>{{$transaction->total_harga}}</td>
                              <td>{{$transaction->jumlah}} Kilogram</td>
                              <td>{{$transaction->tanggal}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
{{-- 
                    <div class="ml-3">
                        {{ $transactions->links() }}
                      </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
