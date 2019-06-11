@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      @if (session('msg'))
      <div class="col-md-12">
        <div id="msg" class="alert alert-danger">
          <h4>
            <strong>{{ session('msg') }}</strong>
            <button id="btnHideMsg" type="button" class="close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </h4>
        </div>
        </div>
      @endif
      <div class="col-md-12">
        <div class="card bg-dark text-dark">
          <div class="card-img-overlay">
            <h4 class="card-title">Terimakasih</h4>
            <p class="card-text"> Cash Rp. {{ number_format($value,0,',','.') }}</p>
            <p class="card-text"> Biaya Admin Rp. {{ number_format($biaya_admin,0,',','.') }}</p>
            <p class="card-text"> Bonus Point {{ $get_point }}</p>
            <a class="btn btn-outline-danger" href="/transaction">Kembali</a>
          </div>
        </div>
      </div>

    </div>
</div>
@endsection
