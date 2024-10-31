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
      <!-- page content -->
          <div class="col-md-12 col-sm-12">
            @if (Auth::user()->image)
            <img src="{{ asset('assets/img/' . Auth::user()->image) }}" alt="Profile Image" class="img-circle profile_img" />
            @else
            <img src="{{ asset('assets/img/user.png') }}" alt="Profile Image" class="img-circle profile_img" />
            @endif
            <h3 class="text-center">{{ Auth::user()->name }}</h3>
            <ul class="list-unstyled user_data text-center">
              <li>
                <i class="fa fa-voicemail user-profile-icon"></i> {{ Auth::user()->email ?? 'N/A' }}
              </li>
              <li>
                <i class="fa fa-map-marker user-profile-icon"></i> {{ Auth::user()->address ?? 'N/A' }}
              </li>
              <li>
                <i class="fa fa-phone user-profile-icon"></i> {{ Auth::user()->phone ?? 'N/A' }}
              </li>
            </ul>
            @if (Auth::user()->wallet)
            <div class="text-center">
              <h4>Wallet Balance</h4>
              <h2>{{ Auth::user()->wallet->balance }}</h2>
            </div>
            @else
            <div class="text-center">
              <h4></h4>
            </div>
            @endif
            <div class="text-center">
              <a class="btn btn-success" href="{{ route('profile.edit') }}">
                <i class="fa fa-edit m-right-xs"></i> Edit Profile
              </a>
              @if (Auth::user()->wallet)
              <a class="btn btn-primary" href="{{ route('wallets.index') }}">
                <i class="fa fa-money m-right-xs"></i> Wallet
              </a>
              @else
              <a class="btn btn-primary" href="{{ route('wallets.create') }}">
                <i class="fa fa-money m-right-xs"></i>Create Wallet
              </a>
              @endif
        </div>
      </div>
    </div>
  </div>
      
    </main>
  </header>
</body>
</html>
