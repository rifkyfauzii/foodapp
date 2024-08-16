@extends('layouts.main')

@section('content')
    <section>
        <h2 class="subtext-services">WHAT WE SERVE</h2>
        <h2 class="headline-services">Your Favorit Food <br>Delivery Partner</h2>

        {{-- Card-section --}}

        <div class="card-section d-flex justify-content-around flex-row">
            <div class="card me-4 border-0" style="width: 18rem; margin-top:60px;">
                <img src="img/order.png" class="card-img-top" alt="order">
                <div class="card-body">
                    <h5 class="card-title text-center">Easy to Order</h5>
                    <p class="card-text text-center text-sm-center">You only need a few steps in ordering food</p>

                </div>
            </div>

            <div class="card me-4 border-0" style="width: 18rem; margin-top:60px; border border-0">
                <img src="img/delivery.png" class="card-img-top" alt="delivery">
                <div class="card-body">
                    <h5 class="card-title text-center">Fastest Delivery</h5>
                    <p class="card-text text-sm-center">Delivery that is always ontime even faster</p>

                </div>
            </div>

            <div class="card me-4 border-0" style="width: 18rem; margin-top:60px; border border-0">
                <img src="img/waiters.png" class="card-img-top" alt="waiters">
                <div class="card-body">
                    <h5 class="card-title text-center">Best Quality</h5>
                    <p class="card-text text-sm-center text-sm-center">Not only fast for us quality is also number one</p>
                </div>
            </div>
        </div>
        <br><br><br><br><br>

    </section>
@endsection
