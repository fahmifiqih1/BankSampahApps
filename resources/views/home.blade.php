@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success"><h3>Saldo Anda :</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="saldo font-weight-bold font-italic">
                       <h2>Rp. {{ number_format(Auth::user()->saldo)}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
