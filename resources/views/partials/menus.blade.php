<section>
    <div class="menus-section">

        {{-- style --}}

        <style>
            .card:hover {
                transform: scale(1.05);
                transition: transform 0.3s ease-in-out;
            }

            .card-title {
                color: #333;
                margin-bottom: 0.5rem;
            }

            .btn-danger {
                background-color: #ff6f61;
                border-color: #ff6f61;
            }

            .btn-danger:hover {
                background-color: #ff3b2f;
                border-color: #ff3b2f;
            }

            .horizontal-scroll::-webkit-scrollbar {
                height: 8px;
            }

            .horizontal-scroll::-webkit-scrollbar-thumb {
                background-color: #ccc;
                border-radius: 10px;
            }

            .horizontal-scroll {
                scrollbar-color: #ccc #f1f1f1;
                scrollbar-width: thin;
            }
        </style>
        <section>
            <h2 class="subtext-menus">Our Menu</h2>

            <h2 class="headline-menus">Menu That Always <br>Makes you Fall in Love</h2>

            <div id="carouselExampleControls" class="horizontal-scroll d-flex overflow-auto gap-3 p-4 bg-light">
                @foreach ($menus as $menu)
                    <div class="carousel-menus">
                        <div class="card shadow-sm" style="width: 18rem; border-radius: 15px; overflow: hidden;">
                            <img class="food img-fluid" src="{{ asset('storage/' . $menu->image) }}"
                                alt="{{ $menu->name }}" style="height: 250px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title font-weight-bold" style="font-size: 1.25rem;">{{ $menu->name }}
                                </h5>
                                <p class="card-text text-muted">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>

                                @auth
                                    {{-- <form action="/order">
                                        <button type="submit" class="btn btn-danger">Order</button>
                                    </form> --}}

                                    <a href="/order/{{ $menu->id }}" class="btn btn-danger">Order</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
