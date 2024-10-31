
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CodePen - Animated Login Form using Html & CSS Only</title>
  <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
</head>
<body>
<section>
  <span></span> <!-- Ditambahkan untuk animasi -->
  <div class="signin">
    <div class="content">
      <h2>Sign Up</h2>
      <form class='form' action="" method="post">
        @csrf
        @foreach ($errors as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
          <div class="inputBox">
            <label for="name">
                <input type="text" name="name" required> <i>Username</i>
            </label>
          </div>
          <div class="inputBox">
            <label for="email">
                <input type="email" name="email" required> <i>Email</i>
            </label>
          </div>
          <div class="inputBox">
            <label for="password">
                <input type="password" name="password" required> <i>Password</i>
            </label>
          </div>
            <div class="inputBox">
                <label for="password_confirmation">
                    <input type="password" name="password_confirmation" required> <i>Confirm Password</i>
                </label>
            </div>
            <div class="inputBox">
                <label for="phone">
                    <input type="string" name="phone" required> <i>Phone</i>
                </label>
            </div>
            <div class="links">
                <p style="color: white">Already have an account?</p>
                <a href="{{ route('login') }}">Login</a>
            </div>
          <div class="inputBox">
            <input type="submit" value="Signup">
          </div>
        </form>
    </div>
  </div>
</section>
</body>
</html>
