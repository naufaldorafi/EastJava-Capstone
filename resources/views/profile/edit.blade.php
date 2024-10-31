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
    }
    .x_panel {
      width: 100%;
      max-width: 600px;
    }
    .profile_img {
      display: block;
      margin: 0 auto;
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
    }
    .user_data li {
      margin-bottom: 10px;
    }
    .text-center h2, .text-center h3 {
      margin: 10px 0;
    }
    .btn {
      margin: 5px;
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
            <form method="POST" action="{{ route('profile.update', ['user' => $user]) }}" data-parsley-validate enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{Auth::user()->name }}">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{Auth::user()->email }}">
                </div>
                <div>
                    <label for="address">Address</label>
                    <input id="address" type="text" name="address" value="{{Auth::user()->address}}">
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input id="phone" type="text" name="phone" value="{{Auth::user()->phone }}">
                </div>
                <div>
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="file">
                    <img id="preview-image" src="{{ auth()->user()->image ? asset('assets/img/' . auth()->user()->image) : '' }}" style="{{ auth()->user()->image ? 'display: block;' : '' }}" />
                </div>
                <div class="ln_solid"></div>
                <div class="text-center">
                    <a href="{{ route('profile.index') }}" class="btn btn-primary">Cancel</a>
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                </form>
        </div>
      </div>
    </div>
  </div>
      
    </main>
  </header>
</body>

  <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script>
    document.getElementById('image').onchange = function (e) {
      const reader = new FileReader();
      reader.onload = function (e) {
        document.getElementById('preview-image').style.display = 'block';
        document.getElementById('preview-image').src = e.target.result;
      };
      reader.readAsDataURL(e.target.files[0]);
    };
  </script>
</html>
