<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<main class="login-form">

    <div class="cotainer">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">Register</div>

                    <div class="card-body">

                        <form method="post" action="{{ route('auth.register') }}">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />


                            <h1 class="h3 mb-3 fw-normal">Register</h1>

                            <div class="form-group form-floating mb-3">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
                                <label for="floatingEmail">Email address</label>
                                @if ($errors->has('email'))
                                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group form-floating mb-3">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Username" required="required" autofocus>
                                <label for="floatingName">Username</label>
                                @if ($errors->has('name'))
                                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group form-floating mb-3">
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                                <label for="floatingPassword">Password</label>
                                @if ($errors->has('password'))
                                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group form-floating mb-3">
                                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
                                <label for="floatingConfirmPassword">Confirm Password</label>
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>

                            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>

                        </form>



                    </div>

                </div>

            </div>

        </div>

    </div>

</main>
</body>
</html>
