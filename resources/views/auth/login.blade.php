<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
</head>
<body>
<div class="container">
    <div class="forms-container">
        <div class="sign-in-form-container">
            <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                @csrf
                <img class="logo" src="{{ asset('/images/UoGLogo.png') }}" alt="">

                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" placeholder="Username" name="email" value="{{ old('email') }}" />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" required />
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <input type="submit" value="{{ __('Login') }}" class="btn solid" />
                @if ($message = Session::get('error'))
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 alert alert-danger">
                                <p>Wrong email or password</p>
                            </div>

                        </div>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h1>WELCOME BACK</h1>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                    ex ratione. Aliquid!
                </p>
            </div>
            <img src="{{ asset('/images/Login-02.svg') }}" class="image" alt="" />
        </div>
    </div>
</div>

</div>

<script
    src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous"
></script>
</body>
</html>


