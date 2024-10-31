<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tours.css') }}">
    <link rel="manifest" href="{{ asset('assets/img/site.webmanifest') }}" />
    <style>
        header {
            width: 100vw;
            height: 100%;
            background-image: url("{{ asset('assets/img/bg.jpg') }}");
            background-position: bottom;
            background-attachment: fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .main_container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .wallet-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table-responsive {
            margin-top: 20px;
        }
    </style>
</head>
<body style="padding-top: 30px">
  @include('layouts.navigation')
  <header>
    <main class="container">
      <div class="clearfix"></div>
      <div class="main_container">
        <div class="col-md-8 col-sm-12 wallet-container">
          <h2 class="text-center" style="color: black">Wallet</h2>
          @if ($wallet)
            <div class="text-center">
              <h4 style="color: black">Current Balance: Rp. {{ number_format($wallet->balance, 2) }}</h4>
              <a href="{{ route('wallets.edit', $wallet->id) }}" class="btn btn-success">Deposit</a>
            </div>
          @else
            <div class="text-center">
              <h4>You do not have a wallet yet.</h4>
              <a href="{{ route('wallets.update') }}" class="btn btn-primary">Create Wallet</a>
            </div>
          @endif
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Type</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                  <td>{{ $transaction->created_at->format('Y-m-d H:i') }}</td>
                  <td>{{ $transaction->type }}</td>
                  <td class="{{ $transaction->type == 'deposit' ? 'text-success' : ($transaction->type == 'purchase' ? 'text-danger' : '') }}">
                    Rp. {{ number_format($transaction->amount, 2) }}
                  </td>
                </tr>
                @endforeach
                @if($transactions->isEmpty())
                <tr>
                  <td colspan="4" class="text-center">No transactions found.</td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
  </header>
  <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
