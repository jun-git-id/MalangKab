@extends('layouts.app')

@section('content')

    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap-coba.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

    </head>
    <div class="container">

        <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Form Title -->
            <h1>Registrasi Marketplace Kabupaten Malang</h1>

            <!-- Name Input -->
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                   required autocomplete="name" placeholder="Nama Lengkap">

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <!-- NIP -->
            <input id="nik" type="number"
                   class="form-control @error('nik') is-invalid @enderror" name="nik"
                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                   value="{{ old('nik') }}" required autocomplete="nik" maxlength="16"
                   placeholder="Nomor Induk Kependudukan">

            @error('nik')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <!--no telp -->
            <input type="number" id="tlp" class="form-control" name="tlp" placeholder="Nomor Telepon">
            <!-- Username Input -->
            <input type="text" id="usrname" class="form-control" name="usrname" placeholder="Username">
            <!-- E-mail Input -->
            <input type="text" id="email" class="form-control" name="email" placeholder="Email">
            <!-- Password Input -->
            <input type="password" id="pwd" class="form-control" name="pwd" placeholder="Password">
            <!-- Password Input -->
            <input type="password" id="cpwd" class="form-control" name="cpwd" placeholder="Konfirmasi Password">

            <!-- Age Dropdown -->
            <!-- <label for="age">Age:</label>
            <select name="user_age" id="age">
                <option value="blank">&nbsp;</option> -->


            <button type="submit">Sign Up</button>

        </form>
    </div>

@endsection