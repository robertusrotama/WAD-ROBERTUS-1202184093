<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>History</title>
</head>

<body>
    <!-- navigation bar -->
    <nav class="navbar navbar-expand-sm bg-light navbar-light justify-content-center">
        <ul class="navbar-nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="/"><strong>HOME</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/product"><strong>PRODUCT</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/order"><strong>ORDER</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/history"><strong>HISTORY</strong></a>
            </li>
        </ul>
    </nav>

    @if ($orders->count() < 1) 
    <div class="d-flex justify-content-center" style="margin-top: 200px; font-size: 20px;">
        <p>There is no data</p>
        </div>
        <div class="d-flex justify-content-center" style="margin-top: 5px">
            <a href="/order" class="btn btn-primary">ORDER NOW</a>
        </div>

        @else
        <h3 class="text-center" style="margin-top: 15px;">History</h3>

        <div class="d-flex justify-content-center" style="margin-top: 25px;">
            <table class="table table-borderless" style="width: 1000px;">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Buyer Name</th>
                        <th>Contact</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="width:500px">{{ $order->product->name }}</td>
                    <td>{{ $order->buyer_name }}</td>
                    <td>{{ $order->buyer_contact }}</td>
                    <td>${{ $order->amount * $order->product->price }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        @endif
</body>

</html>