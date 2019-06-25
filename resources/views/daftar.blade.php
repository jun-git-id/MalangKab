@extends('layouts.app')

@section('content')

<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap-coba.css">
			<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

</head>
<!-- Google Font -->

<form action="index.html" method="post">

<!-- Form Title -->
	<h1>Registrasi Marketplace Kabupaten Malang</h1>
		

		<fieldset>

			<legend> <abbr title="Information"></abbr></legend>
<!-- Name Input -->
      <input id="name" type="text" class="form-control" name="name" placeholder="Nama Lengkap">
			<!-- NIP -->
						<input type="number" id="nip" class="form-control" placeholder="Nomor Induk Kependudukan">
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

		</fieldset>



		<button type="submit">Sign Up</button>

		</form>
    @endsection