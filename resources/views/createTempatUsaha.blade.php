@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('tempatUsaha.store') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Tempat Usaha') }}</label>

            <div class="col-md-6">
                <input id="name" type="text"
                       class="form-control @error('name') is-invalid @enderror" name="name"
                       value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
    @endsection