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

      <div class="col-md-12" style="margin-bottom:10px">
          <div class="card">
              <div class="card-header text-light bg-primary">Topup</div>
              <div class="card-body">
                <form method="POST" action="/transaction/topup">
                    @csrf

                  <div class="form-group row">
                    <label for="value" class="col-md-4 col-form-label text-md-right">Cash</label>

                    <div class="col-md-6">
                        <input id="value" type="number" class="form-control @error('value') is-invalid @enderror" name="value" value="{{ old('value') }}" required autocomplete="value" required>

                        @error('value')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-outline-primary">
                                {{ __('Topup') }}
                            </button>
                        </div>
                    </div>
                </form>
              </div>
          </div>
      </div>

          <div class="col-md-12">
              <div class="card">
                  <div class="card-header text-light bg-danger">Transfer</div>
                  <div class="card-body">
                    <form method="POST" action="/transaction/transfer">
                        @csrf

                    <div class="form-group row">
                        <label for="from" class="col-md-4 col-form-label text-md-right">Sender</label>

                        <div class="col-md-6">
                            <input id="from" type="text" class="form-control @error('from') is-invalid @enderror" name="from" value="{{ Auth::user()->name }}" required autocomplete="from" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="to" class="col-md-4 col-form-label text-md-right">Receiver</label>

                      <div class="col-md-6">
                          <select class="form-control" name="receiver">
                            @foreach ($user as $data)
                              @if (Auth::user()->id != $data->id)
                              <option value="{{ $data->id }}">{{ $data->name }}</option>
                              @endif
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="value" class="col-md-4 col-form-label text-md-right">Cash</label>

                        <div class="col-md-6">
                            <input id="value" type="number" class="form-control @error('value') is-invalid @enderror" name="value" value="{{ old('value') }}" required autocomplete="value" required>

                            @error('value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    {{ __('Kirim') }}
                                </button>
                            </div>
                        </div>
                    </form>
                  </div>
              </div>
          </div>

    </div>
</div>
@endsection
