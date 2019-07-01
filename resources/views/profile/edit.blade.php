@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container mb-5">
            <h1 class="text-center">Edit Profil</h1>
        </div>
        <div class="row justify-content-center">
            <div class="com-md-4 px-5">
                <div class="media-container">
                    <span class="media-overlay">
                        <input type="file" name="image" id="media-input" accept="image/*">
                    </span>

                    <figure class="media-object">
                        <img class="img-object" src="https://image.flaticon.com/icons/svg/149/149098.svg">
                    </figure>
                </div>
                <p class="mt-3">Click image for change photo</p>
            </div>
            <div class="col-md-8">

                <form method="POST" action="/editProfile/{{Auth::user()->id}}">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Nama Lengkap') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text"
                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                   value="{{ Auth::user()->nama }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-left">{{ __('Username') }}</label>

                        <div class="col-md-6">
                            <input id="username" type="text"
                                   class="form-control @error('username') is-invalid @enderror" name="username"
                                   value="{{ Auth::user()->username }}" required autocomplete="username">

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email"
                               class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ Auth::user()->email }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nik" class="col-md-4 col-form-label text-md-left">{{ __('NIK') }}</label>

                        <div class="col-md-6">
                            <input id="nik" type="number"
                                   class="form-control @error('nik') is-invalid @enderror" name="nik"
                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                   value="{{ Auth::user()->nik }}" required autocomplete="nik" autofocus maxlength="16">

                            @error('nik')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_telp"
                               class="col-md-4 col-form-label text-md-left">{{ __('No Telepon') }}</label>

                        <div class="col-md-6">
                            <input id="no_telp" type="number"
                                   class="form-control @error('nik') is-invalid @enderror" name="no_telp"
                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"

                                   value="{{ Auth::user()->no_telp }}" autocomplete="no_telp" autofocus maxlength="12">

                            @error('no_telp')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat"
                               class="col-md-4 col-form-label text-left">{{ __('Alamat') }}</label>

                        <div class="col-md-6">
                                    <textarea id="alamat" type="text" class="form-control"
                                              name="alamat" autocomplete="alamat"> </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label">Jenis Kelamin</label>

                        <div class="col-md-6">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="gender" value="1"
                                       id="gMan" class="custom-control-input"
                                       {{ ( Auth::user()->gender == 1) ? 'checked' : '' }} required>
                                <label class="custom-control-label" for="gMan">Laki-Laki</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="gender" value="2"
                                       id="gWoman"
                                       class="custom-control-input" {{ (Auth::user()->gender == 2) ? 'checked' : '' }} >
                                <label class="custom-control-label" for="gWoman">Perempuan</label>
                            </div>
                            @if ($errors->has('gender'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label"><strong>Change Password</strong></label>
                    </div>
                    <div class="form-group row">
                        <label for="password"
                               class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                   autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                               class="col-md-4 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary w-100">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
