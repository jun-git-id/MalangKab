@extends('layouts.app')
@section('content')

<head>
		<link rel="stylesheet" type="text/css" href="css/editprofile.css">
			<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

</head>
<!-- Google Font -->

<form action="index.html" method="post">

<!-- Form Title -->
	<h1>Edit Profil</h1>



		<fieldset>

			<legend> <abbr title="Information"></abbr></legend>


	<table style="width:70%">
	<tr >
		<td rowspan="10">
		<div class="media-container">
	<span class="media-overlay">
		<input type="file" id="media-input" accept="image/*">
		<i class="glyphicon glyphicon-edit media-icon"></i>
	</span>
	<figure class="media-object">
		<img class="img-object" src="http://placehold.it/200x200">
	</figure>
</div>
		</td>
	</tr>
	
 
  <tr>
	<td>NIK </td>
	<td><input type="number" id="NIK" name="NIK"></td>
  </tr>
  <tr>
	<td>Email </td>
	<td><input type="email" id="mail" name="mail"></td>
  </tr>
  <tr>
	<td>Username </td>
	<td><input type="text" id="username" name="username"></td>
  </tr>
  <tr>
	<td>Nama Lengkap </td>
	<td><input type="text" id="namal" name="namal"></td>
  </tr>
  <tr>
	<td>Nomor Telepon </td>
	<td><input type="number" id="tlp" name="tlp"></td>
  </tr>
  <tr>
	<td>Alamat</td>
	<td><input type="text" id="alamat" name="alamat"></td>
  </tr>
  <tr>
	<td>Organisasi </td>
	<td><input type="text" id="organisasi" name="organisasi"></td>
  </tr>
  <tr>
	<td>Password Baru </td>
	<td><input type="password" id="passwordbaru" name="passwordbaru"></td>
  </tr>
  <tr>
	<td>Konfrmasi Password </td>
	<td><input type="password" id="konfirmasipwd" name="konfirmasipwd"></td>
  </tr>
</table>
  </div>
</div>


		</fieldset>



		<button type="submit">SIMPAN</button>

		</form>
    @endsection