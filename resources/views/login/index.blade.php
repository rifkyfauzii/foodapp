<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fudo | Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <main class="form-signin w-100 m-auto text-center p-4 rounded shadow-lg bg-white">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show p-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif
                @if (session('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show p-3" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif
                <form action="/login" method="post">
                    @csrf
                    <img class="mb-4" src="img/logo.png" alt="Logo" width="80" height="30">
                    <h1 class="h4 mb-3 fw-bold text-dark">Please Login</h1>

                    <div class="form-floating mb-4">
                        <input type="email" name="email"
                            class="form-control @error('email')
                            is-invalid
                        @enderror"
                            id="email" placeholder="name@example.com" autofocus required
                            value="{{ old('email') }}">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" name="password"
                            class="form-control  @error('password')
                            is-invalid
                        @enderror"
                            id="password" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-danger" type="submit">Login</button>
                </form>
                <small class="d-block text-center mt-3">Belum Register? <a href="/register"
                        class="text-primary">Register Disini!</a></small>
            </main>
        </div>
    </div>

</body>

</html>
