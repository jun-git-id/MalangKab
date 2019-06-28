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

	<div class="media-container">
	<span class="media-overlay">
		<input type="file" id="media-input" accept="image/*">
		<i class="glyphicon glyphicon-edit media-icon"></i>
	</span>
	<figure class="media-object">
		<img class="img-object" src="http://placehold.it/200x200">
	</figure>
</div>

		<fieldset>

			<legend> <abbr title="Information"></abbr></legend>
			
<!-- NIK -->
			<label for="nik">Nomor Induk Kependudukan</label>
			<input type="number" id="NIK" name="NIK">
			<!-- Email -->
						<label for="email">Email</label>
						<input type="email" id="mail" name="mail">
						<!--username -->
									<label for="username">Username</label>
									<input type="text" id="username" name="username">
<!-- Nama lengkap -->
												<label for="nama_lengkap">Nama Lengkap</label>
												<input type="text" id="namal" name="namal">
<!-- tlp -->
			<label for="mail">Nomor Telepon</label>
			<input type="number" id="tlp" name="tlp">
<!-- Almaat Input -->
			<label for="alamat">Alamat</label>
			<input type="text" id="alamat" name="alamat">
			<!-- Organisasi Input -->
						<label for="organisasi">Organisasi</label>
						<input type="text" id="organisasi" name="organisasi">
<!-- password baru -->
<label for="ubahpwd">Password Baru</label>
<input type="password" id="passwordbaru" name="passwordbaru">

<!-- password baru lagi -->
<label for="konfirmasipwd">Konfirmasi Password</label>
<input type="password" id="konfirmasipwd" name="konfirmasipwd">

<div class="row">
   <div class="small-12 medium-2 large-2 columns">
     <div class="circle">
       <!-- User Profile Image -->
       <img class="profile-pic" src="http://cdn.cutestpaw.com/wp-content/uploads/2012/07/l-Wittle-puppy-yawning.jpg">

       <!-- Default Image -->
       <!-- <i class="fa fa-user fa-5x"></i> -->
     </div>
  </div>
</div>


		</fieldset>



		<button type="submit">SIMPAN</button>

		</form>
    @endsection