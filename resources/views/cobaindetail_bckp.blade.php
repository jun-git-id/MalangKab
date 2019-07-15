@extends('layouts.app')

@section('content')

<!-- <div class="wadah-gambar"> -->
    <!-- <table style="width:80%;"> -->
        <!-- <tr> -->
            <div style="width: 50%">
                <!-- <td style="border:1px solid"> -->
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(img/product-img/product-9.jpg);">
                                </li>
                                <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(img/product-img/product-2.jpg);">
                                </li>
                                <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(img/product-img/product-3.jpg);">
                                </li>
                                <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(img/product-img/product-4.jpg);">
                                </li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a class="gallery_img" href="img/product-img/product-9.jpg">
                                        <img class="d-block w-100 img-size" src="img/product-img/product-9.jpg" alt="First slide">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="gallery_img" href="img/product-img/product-2.jpg">
                                        <img class="d-block w-100 img-size" src="img/product-img/product-2.jpg" alt="Second slide">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="gallery_img" href="img/product-img/product-3.jpg">
                                        <img class="d-block w-100 img-size" src="img/product-img/product-3.jpg" alt="Third slide">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="gallery_img" href="img/product-img/product-4.jpg">
                                        <img class="d-block w-100 img-size" src="img/product-img/product-4.jpg" alt="Fourth slide">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </td> -->
            </div> 
            <div style="width: 50%;">
                <div class="single_product_desc mt-0">
                    <h4 class="title"><a href="#">Long Yellow Dress</a></h4>
                    <h4 class="price">$ 39.99</h4>
                    <p class="available">Status: <span class="text-muted">Sudah Terverifikasi</span></p>
                        <div class="single_product_ratings mb-15">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                </div>
            </div>

            <!-- </div>           -->
        <!-- </tr>  -->
    <!-- </table> -->
<!-- <div> -->




                        
@endsection