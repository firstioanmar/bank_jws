@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
      @if (!empty($user->balance->user_id))
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header text-light bg-success">Cash</div>

                  <div class="card-body">
                    Rp. {{ number_format($user->balance->cash,0,',','.') }}
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header text-light bg-primary">Point</div>

                  <div class="card-body">
                    {{ $user->balance->point }}
                  </div>
              </div>
          </div>
        @else
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header text-light bg-danger">Dashboard</div>

                  <div class="card-body">
                      <p>
                        Anda belum memiliki saldo. Buat saldo sekarang!
                        <a class="btn btn-outline-primary btn-sm" href="/create_balance">Buat Saldo</a>
                      </p>
                  </div>
              </div>
          </div>
      @endif
    </div>
</div>
@endsection
