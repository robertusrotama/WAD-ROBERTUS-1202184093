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
    <title>Order</title>
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
                <a class="nav-link active" href="/order"><strong>ORDER</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/history"><strong>HISTORY</strong></a>
            </li>
        </ul>
    </nav>

    <!-- end navbar -->

    <main>
       @yield('content') 
    </main>
</body>
</html>
