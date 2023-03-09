@extends('Tadmin.master')

@section('title', 'TARIK SALDO')

@section('content')

    @isset($_GET['alert'])
        @if ($_GET['alert']=='kurang_saldo')
        <div class="alert alert-danger alert-dismissible" role="alert">
            <div class="alert-body">
              <div class="alert-title">Saldo kurang!</div>
              Saldo Anda Tidak mencukupi
            </div>
        </div>
        @endif
    @endisset
    
    <form role="form" action="/pulls/{{$user->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item">No Rekening  : <h5>{{$user->no_rek}}</h5></li>
              <li class="list-group-item">Nama Nasabah : <h5>{{$user->name}}</h5></li>
              <li class="list-group-item">Saldo Anda : <h5>Rp. {{ number_format($user->saldo)}}</h5></li>
            </ul>
          </div>
        <div class="card">
            <div class="card-body">    
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Rp.">
                </div>
            </div>
        </div>

        <div class="ml-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
<script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
      });
    }, 1500);
</script>