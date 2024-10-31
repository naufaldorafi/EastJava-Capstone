@extends('dashboard.layouts.template')
@section('content')
<div class="right_col" role="main">
  <!-- top tiles -->
  <div class="row" style="display: inline-block">
    <div class="tile_count">
      <div class="col-md-12 col-sm-12">
        <div class="col-md-6 col-sm-4 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
          <div class="count">{{ $users->count() }}</div>
        </div>
        <div class="col-md-6 col-sm-4 tile_stats_count">
          <span class="count_top"><i class="fa fa-clock-o"></i> Total Destinations</span>
          <div class="count">{{ $destinations->count() }}</div>
        </div>
        <div class="col-md-6 col-sm-4 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total Bookings</span>
          <div class="count green">{{ $bookings->count() }}</div>
        </div>
        <div class="col-md-6 col-sm-5 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total Revenue</span>
          <div class="count">{{ number_format($totalRevenue, 0, ',', '.') }}</div>
        </div>
      </div>
    </div>
  </div>
  <!-- /top tiles -->

  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Transaction Summary <small>Weekly progress</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="col-md-9 col-sm-12">
            <div class="demo-container" style="height:400px">
              <canvas id="monthlyBookingsChart" class="demo-placeholder"></canvas>
            </div>
          </div>

          <div class="col-md-3 col-sm-12">
            <div>
              <div class="x_title">
                <h2>Top Profiles</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Settings 1</a>
                      <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <ul class="list-unstyled top_profiles scroll-view">
                @foreach ($topBookings as $booking)
                <li class="media event">
                  <a class="pull-left border-aero profile_thumb">
                    <i class="fa fa-user aero"></i>
                  </a>
                  <div class="media-body">
                    <a class="title" href="#">{{ $booking->name }}</a>
                    <p>Total price: <strong>{{ number_format($booking->bookings_sum_total_price, 0, ',', '.') }}</strong></p>
                    <p>Total book: <small>{{ $booking->bookings_count }}</small></p>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="dashboard_graph">
        <div class="row x_title">
          <div class="col-md-4">
            <h3>Top 5 cities by Booking </h3>
            @foreach ($topCities as $city)
          <div class="col-md-12 col-sm-12">
            <div>
              <p>{{ $city->name }}</p>
              <div class="">
                <div class="progress progress_sm" style="width: 100%;">
                  <div class="progress-bar bg-green" role="progressbar" style="width: {{ $city->percentage }}%;" data-transitiongoal="{{ $city->percentage }}"></div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          </div>
          <div class="col-md-8">
            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
            <span>{{ now()->format('M d, Y') }} - {{ now()->addMonths(10)->format('M d, Y') }}</span>
            <b class="caret"></b>
            <canvas id="topCitiesChart" class="demo-placeholder" style="border: 1px solid #ccc; padding: 5px 10px; cursor: pointer;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br />
</div>
</div>

<script>
  // Monthly bookings chart
  const ctx1 = document.getElementById('monthlyBookingsChart').getContext('2d');
  const monthlyBookingsData = {
    labels: {!! json_encode($monthlyBookingsLabels) !!},
    datasets: [{
      label: 'Bookings',
      data: {!! json_encode($monthlyBookingsData) !!},
      backgroundColor: 'rgba(75, 192, 192, 0.2)',
      borderColor: 'rgba(75, 192, 192, 1)',
      borderWidth: 1
    }]
  };

  new Chart(ctx1, {
    type: 'line',
    data: monthlyBookingsData,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  // Top cities bookings density chart
  const ctx2 = document.getElementById('topCitiesChart').getContext('2d');
  const bookingsData = @json($bookingsData);
  const months = Array.from({ length: 11 }, (v, i) => {
    const date = new Date();
    date.setMonth(date.getMonth() + i);
    return date.toLocaleString('default', { month: 'short' }) + ' ' + date.getFullYear();
  });

  const datasets2 = [];
  for (const city in bookingsData) {
    const data = new Array(11).fill(0);
    bookingsData[city].forEach(booking => {
      const monthIndex = months.findIndex(month => 
        new Date(booking.year, booking.month - 1).toLocaleString('default', { month: 'short' }) + ' ' + booking.year === month
      );
      if (monthIndex >= 0) {
        data[monthIndex] = booking.total;
      }
    });
    datasets2.push({
      label: city,
      data: data,
      borderColor: getRandomColor(),
      fill: false
    });
  }

  new Chart(ctx2, {
    type: 'line',
    data: {
      labels: months,
      datasets: datasets2
    },
    options: {
      responsive: true,
      scales: {
        x: {
          title: {
            display: true,
            text: 'Month'
          }
        },
        y: {
          title: {
            display: true,
            text: 'Bookings'
          }
        }
      }
    }
  });

  function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
  }
</script>
@endsection
