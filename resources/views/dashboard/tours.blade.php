<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link rel="stylesheet" href="{{asset('assets/css/tours.css')}}">
</head>
<body>
    <header>
      @if (request()->is('dashboard/tours/surabaya'))
        <h1>Surabaya</h1>
      @elseif (request()->is('dashboard/tours/gresik'))
        <h1>Gresik</h1>
      @elseif (request()->is('dashboard/tours/malang'))
        <h1>Malang</h1>
      @elseif (request()->is('dashboard/tours/banyuwangi'))
        <h1>Banyuwangi</h1>
      @elseif (request()->is('dashboard/tours/kediri'))
        <h1>Kediri</h1>
      @else
      <h1>Jember</h1>
      @endif
          <nav>
            <main class="container">
              @foreach ($tours->where('location', 'surabaya') as $tour)
                <div class="product">
                    <img src="{{$tour->image}}" alt="Produk 1">
                    <h2>{{ $tour->name }}</h2>
                    <p>Rp {{ $tour->price }}</p>
                    <button>More info</button>
                </div>
              @endforeach
                {{-- <div class="product">
                    <img src="{{asset('assets/img/product1.jpg')}}" alt="Produk 1">
                    <h2>Museum 10 November</h2>
                    <p>Rp 100.000</p>
                    <button>More info</button>
                </div>
                <div class="product">
                    <img src="{{asset('assets/img/product2.jpg')}}" alt="Produk 2">
                    <h2>Tugu Pahlawan</h2>
                    <p>Rp 150.000</p>
                    <button>More info</button>
                </div>
                <div class="product">
                    <img src="{{asset('assets/img/product2.jpg')}}" alt="Produk 2">
                    <h2>Museum Surabaya</h2>
                    <p>Rp 150.000</p>
                    <button>More info</button>
                </div>
                <div class="product">
                    <img src="{{asset('assets/img/product2.jpg')}}" alt="Produk 2">
                    <h2>Monumen Kapal Selam</h2>
                    <p>Rp 150.000</p>
                    <button>More info</button>
                </div>
                <div class="product">
                    <img src="{{asset('assets/img/product2.jpg')}}" alt="Produk 2">
                    <h2>Taman Kenjeran</h2>
                    <p>Rp 150.000</p>
                    <button>More info</button>
                </div>
                <div class="product">
                    <img src="{{asset('assets/img/product2.jpg')}}" alt="Produk 2">
                    <h2>Atlantis Land</h2>
                    <p>Rp 150.000</p>
                    <button>More info</button>
                </div>
                <div class="product">
                    <img src="{{asset('assets/img/product2.jpg')}}" alt="Produk 2">
                    <h2>JALAN TUNJUNGAN</h2>
                    <p>Rp 150.000</p>
                    <button>More info</button>        
                </div>
                <div class="product">
                    <img src="{{asset('assets/img/product2.jpg')}}" alt="Produk 2">
                    <h2>Surabaya North QUAY</h2>
                    <p>Rp 150.000</p>
                    <button>More info</button>
                </div>
                <div class="product">
                    <img src="{{asset('assets/img/product2.jpg')}}" alt="Produk 2">
                    <h2>Masjid Al-Akbar</h2>
                    <p>Rp 150.000</p>
                    <button>More info</button>
                </div>
                <div class="product">
                    <img src="{{asset('assets/img/product2.jpg')}}" alt="Produk 2">
                    <h2>Masjid Sunan Ampel</h2>
                    <p>Rp 150.000</p>
                    <button>More info</button>
                </div>
                <div class="product">
                    <img src="{{asset('assets/img/product2.jpg')}}" alt="Produk 2">
                    <h2>Wisata Perahu Kalimas</h2>
                    <p>Rp 150.000</p>
                    <button>More info</button>
                </div>
                <div class="product">
                    <img src="{{asset('assets/img/product2.jpg')}}" alt="Produk 2">
                    <h2>Museum Pendidikan Surabaya</h2>
                    <p>Rp 150.000</p>
                    <button>More info</button>
                </div> --}}
            </main>
        <!-- Tambahkan lebih banyak produk di sini -->
        </nav>
    </header>
    <footer>
        <p>Hak Cipta &copy; 2024 Online Shop</p>
    </footer>
</body>
</html>
