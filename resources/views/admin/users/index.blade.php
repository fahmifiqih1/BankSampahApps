@extends('Tadmin.master')

@section('title', 'Users')

@section('content')
<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Data Nasabah</h4>
      </div>
      
      <div class="row">
        <form action="/users/search" method="GET" class="form-inline mr-auto ml-4">
          <div class="search-element">
            <input class="form-control" type="text" name="keyword" value="{{ old('keyword')}}" placeholder="Search name" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
          </div>
        </form>
  
        <div class="print dropdown d-inline">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Print
          </button>
          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
            <a class="dropdown-item has-icon" href="/users/pdf"><i class="far fa-file"></i>Print PDF</a>
          </div>
        </div>
      </div>
     
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tbody><tr>
              <th>No</th>
              <th>No Rek</th>
              <th>Nama Nasabah</th>
              <th>Email</th>
              <th>Saldo</th>
              <th>Action</th>
            </tr>
            @forelse ($users as $key => $user)
                <tr>
                    <td>{{$users->firstItem()+$key}}</td>
                    <td>{{ $user->no_rek }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>Rp. {{ number_format($user->saldo) }}</td>
                    <td>
                        <a href="#" class="btn btn-secondary">Detail</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @empty
                
            @endforelse
            
          </tbody>
        </table>
        </div>
      </div>

      <div class="ml-3">
        {{ $users->links() }}
      </div>

    </div>
  </div>
@endsection