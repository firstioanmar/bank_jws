@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

      <div class="list-group col-md-12">
        @foreach ($history as $data)
          @if ($data->users_from->id || $data->users_to->id == Auth::user()->id)
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">
                @if ($data->type_history == 1)
                  Transfer
                @else
                  Topup
                @endif
              </h5>
              <small class="text-muted">{{ $data->created_at }}</small>
            </div>
            <p class="mb-1">
              @if ($data->type_history == 1)
                From {{ $data->users_from->name }} To {{ $data->users_to->name }}
              @else
                {{ $data->users_from->name }}
              @endif
            </p>
            <small class="text-muted">Rp. {{ number_format($data->value,0,',','.') }}</small>
          </a>
        @endif
        @endforeach
      </div>
      <div style="margin-top:10px;">
        {{ $history->links() }}
      </div>

    </div>
</div>
@endsection
