<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset ('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/css/pages/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body>
    <div class="container auth-login pt-4 mt-4">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="content-log">
            <div class="card login">
                <div class="row">
                    <div class="col-md-6">
                        <div class="image">
                            <img src="{{ asset('assets/images/logo/My password-rafiki.png') }}" alt=""
                                class="img-fluid image-login">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1 class="text-center cl-dark">Log in.</h1>


                        <form action="{{ route('post-login-user') }}" method="post">
                            @csrf
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="email" name="email"
                                    class="form-control form-control-xl @error ('email') is-invalid @enderror "
                                    placeholder="Email">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                @error('email')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="password" name="password"
                                    class="form-control form-control-xl @error ('password') is-invalid @enderror"
                                    placeholder="Password">
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                                @error('password')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <button class="btn btn-primary btn-block btn-lg bg-dark shadow-lg mt-5">Log in</button>
                        </form>
                        <div class="text-center mt-5 text-lg fs-4">
                            <p class="text-gray-600">Dont have an account? <a href="{{ route('regist-user') }}"
                                    class="font-bold cl-dark">Sign
                                    up</a>.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
