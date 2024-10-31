<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Destination Booking</title>
  <!-- Bootstrap -->
  <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom Theme Style -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/tours.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
  <link rel="manifest" href="{{ asset('assets/img/site.webmanifest') }}" />
  <style>
    .product-image img {
      width: 100%;
      height: 800px;
      object-fit: cover;
    }
  </style>
</head>
<body class="nav-md" style="padding-top: 60px">
  @include('layouts.navigation')
  <div class="container body">
    <div class="main_container">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Destination Booking</h2>
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                
              @endif
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-5 col-sm-5">
                <div class="product-image">
                  @if ($destination->image)
                    <img src="{{ asset('assets/img/' . $destination->image) }}" alt="..." />
                  @else
                    <img src="{{ asset('assets/img/apple-touch-icon.png') }}" alt="..." />
                  @endif
                </div>
              </div>

              <div class="col-md-7 col-sm-7" style="border: 0px solid #e5e5e5">
                <h3 class="prod_title">{{ $destination->name }}</h3>
                <p>{{ $destination->description }}</p>
                <br />
                <form method="POST" action="{{ route('bookings.store') }}">
                  @csrf
                  <div class="form-group">
                    <label for="quantity">Jumlah Tiket</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" min="1" value="1" required>
                  </div>

                  <div class="form-group">
                      <label for="booking_date">Tanggal Keberangkatan</label>
                      <input type="date" id="booking_date" name="booking_date" class="form-control" min="{{ date('Y-m-d') }}" required>
                  </div>

                  <div class="product_price">
                    <input type="hidden" value="{{ $destination->price }}" id="price">
                    <h1 class="price">Rp.<span id="total-price" class="price">{{ number_format($destination->price, 0, ',', '.') }}</span></h1>
                  </div>

                  <input type="hidden" name="destination_id" value="{{ $destination->id }}">
                  <input type="hidden" name="total_price" id="total_price" value="{{ $destination->price }}">
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                  <div class="form-group">
                    <button type="submit" class="btn btn-info btn-lg">Booking</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<script>
  document.getElementById('quantity').addEventListener('input', function() {
    const quantity = this.value;
    const price = parseFloat(document.getElementById('price').value);
    const totalPrice = quantity * price;
    document.getElementById('total-price').innerText = totalPrice.toLocaleString('id-ID');
    document.getElementById('total_price').value = totalPrice;
  });
</script>
</body>
</html>
