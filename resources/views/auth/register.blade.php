@extends('layouts.app')

@section('content')

    <div class="container col-lg-4">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1 class="text-center mb-3">Registrasi Marketplace Kabupaten Malang</h1>

            <div>
                <input id="name" type="text"
                       class="form-control input_class @error('name') is-invalid @enderror" name="name"
                       value="{{ old('name') }}" required autocomplete="name" placeholder="Nama Lengkap">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div>
                <input id="nik" type="number"
                       class="form-control input_class @error('nik') is-invalid @enderror" name="nik"
                       oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                       value="{{ old('nik') }}" required autocomplete="nik" placeholder="Nomor Induk Kependudukan" maxlength="16">

                @error('nik')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


            <div>
                <input id="no_telp" type="number"
                       class="form-control input_class @error('nik') is-invalid @enderror" name="no_telp"
                       oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"

                       value="{{ old('no_telp') }}" required autocomplete="no_telp" placeholder="Nomor Telepon" maxlength="12">

                @error('no_telp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div>
                <input id="email" type="email"
                       class="form-control input_class @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required placeholder="Email" autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div>
                <input id="username" type="text"
                       class="form-control input_class @error('username') is-invalid @enderror" name="username"
                       value="{{ old('username') }}" required placeholder="Username" autocomplete="username">

                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div>
                <input id="password" type="password"
                       class="form-control input_class @error('password') is-invalid @enderror" name="password"
                       required placeholder="Password" autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


            <div>
                <input id="password-confirm" type="password" class="form-control input_class"
                       name="password_confirmation" required placeholder="Konfirmasi Password" autocomplete="new-password">
            </div>

                <div>
                    <button type="submit" class="btn btn-primary w-100">
                        {{ __('Register') }}
                    </button>
                </div>
        </form>
    </div>

@endsection
