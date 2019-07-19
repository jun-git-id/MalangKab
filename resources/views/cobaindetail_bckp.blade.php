@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- disni corousel -->
            <div id="sync1" class="slider owl-carousel">
                @foreach($product->productimage as $item)
                    <div class="item">
                        <img src="{{ asset('storage/' . $item->path . '/' . $item->filename)}}"
                             alt="{{ $item->filename }}">
                    </div>
                @endforeach
            </div>
            <div id="sync2" class="navigation-thumbs owl-carousel mb-3">
                @foreach($product->productimage as $item)
                    <div class="item">
                        <img src="{{ asset('storage/' . $item->path . '/' . $item->filename)}}"
                             alt="{{ $item->filename }}">
                    </div>
                @endforeach
            </div>
            <!-- sampe sini -->
        </div>
    </div>




                        
@endsection