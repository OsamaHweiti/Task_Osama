<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    

  <section   style="margin-top: 9%">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="{{route('register')}}" method="POST" >
                    @csrf
                    {{-- username input --}}
                    <div class="form-outline mb-4">
                        <label class="form-label" >Username</label>
                        <input type="text" id="email_address" name="username" class="form-control form-control-lg"
                            placeholder="Enter your username"  required/>
                            @if ($errors->has('username'))
                            <p class="alert alert-danger">{{ $errors->first('username') }}</p>
                            @endif
                    </div>
                    

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" >Email address</label>
                        <input type="email" id="email_address" name="email" class="form-control form-control-lg"
                            placeholder="Enter a valid email address" required />
                            @if ($errors->has('email'))
                            <p class="alert alert-danger">{{ $errors->first('email') }}</p>
                            @endif
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" >Password</label>
                        <input type="password"  id="password"  name="password" class="form-control form-control-lg"
                            placeholder="Enter password" required/>
                            @if ($errors->has('password'))
                            <p class="alert alert-danger">{{ $errors->first('password') }}</p>
                            @endif

                    </div>



                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="{{url('/login')}}"
                                class="link-danger">Login</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>

</section>
</body>
</html>