@extends('User.layout.masterLayout')
@section('title', 'Detail Product')
@section('content')

<div class="section detail-product mb-5">
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <div class="image-pro">
                <img src="{{ asset('assets/images/product/'.$product->image) }}" alt="" class="img-itm-pro img-fluid">
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="cl-dark mb-3">{{ $product->name }}</h4>
                    <h3 class="cl-dark mb-3">Rp. {{ number_format($product->harga , 0, ',', '.') }}</h3>
                    <div class="varian-warna d-flex gap-3 align-items-center mb-3">
                        <label for=""> Product Color: </label>
                        @foreach ($product->warna as $color )
                            <div class="btn btn-outline-dark color">{{ $color->name }}</div>
                        @endforeach

                    </div>
                    <div class="varian-ukuran d-flex gap-3 align-items-center mb-3">
                        <label for=""> Product Size: </label>
                        @foreach ($product->ukuran as $size )
                            <div class="btn btn-outline-dark size">{{ $size->ukuran }}</div>
                        @endforeach
                    </div>

                    <div class="detail mt-5 mb-3">
                        <p class="cl-grey">{{ $product->deskripsi }}</p>
                    </div>

                    <div class="footer-card d-flex justify-content-between gap-4">
                        <div class="qty-controll" id="qty">
                            <button class="btn btn-dark" id="qty-decrease"> - </button>
                            <input type="text" value="1" class="qty-input text-center" id="qty-value-input" style="width: 40%">
                            <button class="btn btn-dark" id="qty-increase"> + </button>
                        </div>

                        <div class="cekout-btn">
                            <div class="btn btn-dark addTocart" xid="{{ $product->id }}" style="width: 250px"> Order Now</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function(){
        var qtyValue = document.getElementById('qty-value-input');
        var btnDecrease = document.getElementById('qty-decrease');
        var btnIncrease = document.getElementById('qty-increase');

        btnDecrease.addEventListener('click', function(){
            var curentValue = parseInt(qtyValue.value, 10);
            if(curentValue > 1){
                qtyValue.value = curentValue - 1;
            }
        });

        btnIncrease.addEventListener('click', function(){
            var curentValue = parseInt(qtyValue.value, 10);
            qtyValue.value = curentValue + 1;
        });

    });
</script>
@stop
