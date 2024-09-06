<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fudo | Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-5">
            <main class="form-registration w-100 m-auto text-center p-4 rounded shadow-lg bg-white">
                <form action="/register" method="POST">
                    @csrf
                    <img class="mb-4" src="img/logo.png" alt="Logo" width="80" height="30">
                    <h1 class="h4 mb-3 fw-bold text-dark">Register Form</h1>

                    <div class="form-floating mb-4">
                        <input type="text" name="name"
                            class="form-control @error('name')
                            is-invalid
                        @enderror"
                            id="floatingInput" placeholder="Masukan Username" required value="{{ old('name') }}">
                        <label for="floatingInput">Username</label>
                        @error('name')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-4">
                        <input type="text" name="role"
                            class="form-control @error('role')
                            is-invalid
                        @enderror"
                            id="floatingInput" placeholder="Masukan Role" required value="{{ old('role') }}">
                        <label for="floatingInput">Role</label>
                        @error('role ')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-4">
                        <input type="email" name="email"
                            class="form-control @error('email')
                        is-invalid
                        @enderror"
                            id="floatingInput" placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" name="password"
                            class="form-control @error('password')
                        is-invalid
                        @enderror"
                            id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                        @error('password')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-danger" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">Sudah Punya akun? <a href="/login" class="text-primary">Login
                        Disini!</a></small>
            </main>
        </div>
    </div>

</body>

</html>
