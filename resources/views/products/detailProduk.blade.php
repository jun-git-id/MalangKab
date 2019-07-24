@extends('layouts.app')

@section('content')
    <!-- <<<<<<<<<<<<<<<<<<<< Single Product Details Area Start >>>>>>>>>>>>>>>>>>>>>>>>> -->
    <section class="single_product_details_area mb-5">
        <div class="container mt-3">
            <div class="row">

                <div class="col-12 col-md-4">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">
                                @foreach($products -> productimage as $key => $item)
                                    <li class="list-img  @if($key==0) active @endif" data-target="#product_details_slider"
                                        data-slide-to="{{$key}}"
                                        style="background-image: url({{asset('storage/'.$item->path . '/' . $item->filename )}});">
                                    </li>
                                @endforeach
                            </ol>

                            <div class="carousel-inner">
                                @foreach($products -> productimage as $key => $item)
                                    <div class="carousel-item @if($key==0) active @endif">
                                        <a class="gallery_img" href="{{asset('storage/'.$item->path . '/' . $item->filename )}}">
                                            <img class="d-block w-100"
                                                 src="{{asset('storage/'.$item->path . '/' . $item->filename )}}"
                                                 alt="First slide">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="single_product_desc">

                        <h4 class="title">{{$products->nama_produk}}</h4>
                        <h6 class="mb-3">Tempat Usaha : {{$products -> provider -> nama_tempat}}</h6>

                        <h4 class="price">Rp. {{$products->harga}}</h4>

                        <p class="available">Stok: <span class="text-muted">{{$products->stok}}</span></p>

                        <div class="single_product_ratings mb-15">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>

                        <div class="mb-5" id="accordion" role="tablist">
                            <div class="card">
                                <h6 class="mt-3">
                                    Deskripsi Produk
                                </h6>
                                <h6 class="dropdown-divider"></h6>
                                <div id="collapseOne" class="" role="tabpanel" aria-labelledby="headingOne"
                                     data-parent="#accordion">
                                    <div class="">
                                        <p class="">{{$products->deskripsi}}</p>
                                    </div>
                                </div>
                                <h6 class="dropdown-divider"></h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- <<<<<<<<<<<<<<<<<<<< Single Product Details Area End >>>>>>>>>>>>>>>>>>>>>>>>> -->

    <!-- ****** Quick View Modal Area Start ****** -->
    <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="quickview_body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="quickview_pro_img">
                                        <img src="img/product-img/product-1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="quickview_pro_des">
                                        <h4 class="title">Boutique Silk Dress</h4>
                                        <div class="top_seller_product_rating mb-15">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        <h5 class="price">$120.99 <span>$130</span></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia expedita
                                            quibusdam aspernatur, sapiente consectetur accusantium perspiciatis
                                            praesentium eligendi, in fugiat?</p>
                                        <a href="#">View Full Product Details</a>
                                    </div>
                                    <!-- Add to Cart Form -->
                                    <!-- <form class="cart" method="post">
                                        <div class="quantity">
                                            <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>

                                            <input type="number" class="qty-text" id="qty2" step="1" min="1" max="12" name="quantity" value="1">

                                            <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        </div>
                                        <button type="submit" name="addtocart" value="5" class="cart-submit">Add to cart</button> -->
                                    <!-- Wishlist -->
                                    <!-- <div class="modal_pro_wishlist">
                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a> -->
                                </div>
                                <!-- Compare -->
                                <div class="modal_pro_compare">
                                    <a href="compare.html" target="_blank"><i class="ti-stats-up"></i></a>
                                </div>
                                </form>

                                <!-- <div class="share_wf mt-30">
                                    <p>Share With Friend</p>
                                    <div class="_icon">
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- ****** Quick View Modal Area End ****** -->

    <section class="you_may_like_area clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3 text-center">
                        <h2>Related Products</h2>
                    </div>
                </div>


                @if($relatedProducts->count())
                    @foreach($relatedProducts as $itemProduct)
                        <div class="col-lg-3 mt-4 d-flex">
                            <div class="card" style="width: 18rem;">
                                <a href="/detailproduk/{{$itemProduct->id}}">
                                    <img src="{{ asset('storage/' . $itemProduct->image) }}"
                                         class="card-img-top py-2 card-img-container" alt="...">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{$itemProduct->nama_produk}}</h5>
                                    <p class="card-text">{{$itemProduct->deskripsi}}</p>
                                    <div class="row ml-0">
                                        <p><i class="fas fa-heart"></i> {{$itemProduct->like}}</p>
                                        <p><i class="fas fa-star ml-4"></i> {{$itemProduct->rating}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <div class="text-center">
                            <span class="fas fa-store fa-4x mt-5 mb-3 opacity-3"></span>
                            <h3 class="opacity-3">Tidak ada produk tersedia</h3>
                        </div>
                    </div>
                @endif
        </div>
        </div>
    </section>

    <!-- /.wrapper end -->
    <!-- klo sama hkiki dsini dimatiin -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    {{--    <script src="js/jquery/jquery-2.2.4.min.js"></script>--}}
    <!-- Popper js -->
    {{--    <script src="js/popper.min.js"></script>--}}
    <!-- Bootstrap js -->
    {{--    <script src="js/bootstrap.min.js"></script>--}}
    <!-- Plugins js -->
    <script src="{{asset('js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('js/active.js')}}"></script>

    <!-- </body> -->

@endsection