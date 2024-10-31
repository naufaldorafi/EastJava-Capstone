<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Animated Login Form using Html & CSS Only</title>
  <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
  <style>
    .error {
      color: white;
      background-color: red; /* Menambah latar belakang merah pada pesan error */
    }
  </style>
</head>
<body>

<section>
  <span></span> <!-- Ditambahkan untuk animasi -->
  <div class="signin">
    <div class="content">
      <h2>Sign In</h2>
      <form class="form" action="{{ route('login') }}" method="POST">
        @csrf
        @if(session('error'))
          <p class="error">{{ session('error') }}</p>
        @endif
        <div class="inputBox">
          <label for="email">
            <input type="email" name="email" id="email" required> <i>Email</i>
          </label>
        </div>
        <div class="inputBox">
          <label for="password">
            <input type="password" name="password" id="password" required> <i>Password</i>
          </label>
        </div>
        <div class="links">
          <a href="{{ route('password.request') }}">Forgot Password</a>
          <a href="{{ route('register') }}">Signup</a>
        </div>
        <div class="inputBox">
          <input type="submit" value="Login">
        </div>
      </form>
    </div>
  </div>
</section>

</body>
</html>
