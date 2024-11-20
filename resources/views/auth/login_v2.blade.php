<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/login-register.css')}}">
    <style>
        .form-check-input { margin-left: 3px;}
        #form-check-label { margin-left: 20px; }
    </style>
</head>
<body>
    <div class="image-side">
        <div class="content">
            <h1>Manuel S. Enverga University<br> Foundation Candelaria Inc<br> Grading System</h1>
        </div>
    </div>
    <div class="form-side-login">
        <img src="{{asset('assets/images/logo.png')}}" alt="Logo" class="logo">
        <h2 class="text-center">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="input_type" placeholder="Username or Email" required>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

            </div>
            <div class="form-group">
                <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <div>
                    <input type="checkbox" id="show_password" class="form-check-input" onclick="showPassword('password')">
                    <label id="form-check-label" for="show_password">Show Password</label>
                </div>
                <div>
                    <input type="checkbox" id="remember" name="remember" class="form-check-input">
                    <label id="form-check-label" for="remember">Remember me</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
            {{-- <p class="mt-3 text-center">Don't have an account? <a href="signup.html">Sign Up</a></p> --}}
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function showPassword(inputId) {
            var password = document.getElementById(inputId);

            if(password.type == 'password') {
                password.type = 'text';
            } else if(password.type == 'text') {
                password.type = 'password'
            }
        }
    </script>
</body>
</html>
