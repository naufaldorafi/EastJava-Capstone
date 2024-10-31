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
        </style>
</head>
<body style="padding-top: 30px">
  @include('layouts.navigation')
  <header>
    @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
    @endif
    <main class="container">
      <h1>Destinations</h1>
      @foreach ($destinations as $destination)
        <div class="product">
@if ($destination->image)
  <img src="{{asset('assets/img/'. $destination->image)}}" alt="Gambar bang" style="width: 250px; height: 200px;">
@else
  <img src="{{asset('assets/img/apple-touch-icon.png')}}" alt="Gambar bang" style="width: 250px; height: 200px;">
@endif
            <h2>{{ $destination->name }}</h2>
            <p style="color: white">Rp {{ $destination->price }}</p>
            <a href="{{route('destinations.show', ['destination' => $destination])}}">
              More info
            </a>

        </div>
      @endforeach
    </main>
  </header>
</body>
</html>
