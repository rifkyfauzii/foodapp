<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-danger text-white text-center">
                        <h3>Fudo | Order Form</h3>
                    </div>
                    <div class="card-body">
                        <div class="card shadow-sm" style="width: 18rem; border-radius: 15px; overflow: hidden;">
                            <img class="food img-fluid" src="{{ asset('storage/' . $menu->image) }}"
                                alt="{{ $menu->name }}" style="height: 250px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title font-weight-bold" style="font-size: 1.25rem;">
                                    {{ $menu->name }}
                                </h5>
                                <p class="card-text text-muted">Rp {{ number_format($menu->price, 0, ',', '.') }}
                                </p>

                                @auth
                                    {{-- <form action="/order">
                                            <button type="submit" class="btn btn-danger">Order</button>
                                        </form> --}}

                                    <a href="/order/{{ $menu->id }}" class="btn btn-danger">Order</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>
