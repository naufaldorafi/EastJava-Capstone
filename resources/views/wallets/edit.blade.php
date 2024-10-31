<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
        <link
      href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}"
      rel="stylesheet"
    />
    
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" />
    <link
    rel="apple-touch-icon"
    sizes="180x180"
    href="{{asset('assets/img/apple-touch-icon.png')}}"
    />
    <link
    rel="icon"
    type="image/png"
    sizes="32x32"
    href="{{asset('assets/img/favicon-32x32.png')}}"
    />
    <link
    rel="icon"
    type="image/png"
    sizes="16x16"
    href="{{asset('assets/img/favicon-16x16.png')}}"
    />
    <link rel="stylesheet" href="{{asset('assets/css/tours.css')}}">
        <link rel="manifest" href="{{asset('assets/img/site.webmanifest')}}" />
        <style>
          header {
    width: 100vw;
    height: 100%;
    background-image: url("{{asset('assets/img/bg.jpg')}}");
    background-position: bottom;
    background-attachment: fixed;
    background-size: cover;
    display: flex;
    align-items: end;
    justify-content: center;

  }
  .main_container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  width: 100%;
}

form {
  background: #fff;
  padding: 20px;
  border: 1px solid #ccc;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  border-radius: 4px;
  width: 100%;
  max-width: 500px;
}
        </style>
</head>
<body style="padding-top: 30px">
  @include('layouts.navigation')
  <header>
    <main class="container">
      <div class="">
        <div class="clearfix"></div>
        <div class="main_container">
          <div class="">
            <h2>Masukkan nominal</h2>
            <form method="POST" action="{{ route('wallets.update', ['wallet' => Auth::user()->wallet]) }}">
              @method('PUT')
              @csrf
              <div class="form-group">
                <label for="balance">
                  <input type="number" class="form-control" id="balance" name="balance" required>
                </label>
              </div>
              <button type="submit" class="btn btn-primary">Deposit</button>
              <a href="{{ route('wallets.index') }}" class="btn btn-secondary">Back</a>
            </form>
          </div>
        </div>
      </div>
    </main>
  </header>
</body>
</html>
</body>
</html>
