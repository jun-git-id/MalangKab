@extends('layouts.app')
@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Malang Marketplace</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-lg-auto text-center">
      <li class="nav-item mr-3 mt-lg-0 mt-3">
        <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Tempat Usaha</a>
      </li> -->
      <li class="nav-item dropdown mr-3 mt-lg-0 mt-3">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tempat Usaha
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Tempat</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Tempat Saya</a>
          <a class="dropdown-item" href="#">Tempat Favorit</a>
        </div>
      </li>
      <li class="nav-item dropdown mr-3 mt-lg-0 mt-3">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Produk
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Produk</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Produk Saya</a>
          <a class="dropdown-item" href="#">Produk Favorit</a>
        </div>
      </li>
      <li class="nav-item mr-3 mt-lg-0 mt-3">
        <a class="nav-link" href="/daftar">Daftar</a>
      </li>
      <li class="nav-item mr-3 mt-lg-0 mt-3">
        <a class="nav-link" href="#">Login</a>
      </li>
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>
