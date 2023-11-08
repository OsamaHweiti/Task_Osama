<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="{{ route('Login') }}" method="POST">

                        @csrf
                        {{-- success messsages from register --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        {{-- error message from controller --}}
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" id="email" class="form-control form-control-lg" required
                                placeholder="Enter your email" />

                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg"placeholder="Enter password"
                                required />

                        </div>



                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Log in </button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ url('/register') }}"
                                class="link-danger">Register</a></p>
                        {{-- <a href="" class="mr-3">Doesn't have an account? Signin</a> --}}


                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
