<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager sistem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <style>
        body {
            min-height: 100vh;
            padding-bottom: 100px;
            position: relative;
            background-color: white;
        }

        header {
            background-color: #212529;
            border-bottom: 1px solid;
        }

        .row {
            margin: 0;
        }

        .container-fluid {
            padding: 0;
        }

        .btn-primary {
            border: 2px solid blue;
        }

        #navbar {
            justify-content: space-between;
            padding: 5px 0;
        }

        #navbar a {
            color: white
        }

        #search-container {
            background-image: url('/img/nft.jpg');
            background-size: cover;
            background-position: center;
            height: 400px;
            padding: 50px;
            text-align: center;
        }

        #search-container h1 {
            margin-bottom: 30px;
            font-weight: 900;
        }

        #products-container {
            padding: 50px;
        }

        #cards-container {
            display: flex;
        }

        #products-container .card {
            flex: 1 1 0;
            max-width: 25%;
            border-radius: 10px;
            padding: 0;
            margin: 5px;
        }

        #products-container img {
            max-height: 150px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            object-fit: cover;
        }

        .card .card-name {
            font-size: 20px;
            font-weight: bold;
        }

        footer {
            text-align: center;
            background-color: #212529;
            padding: 30px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin-bottom: 0;
            color: white;
        }
    </style>
</head>


<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="" alt="">
                </a>
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Entrar</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link">Registrar-se</a>
                        @endif
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item">
                        <a href="/home" class="nav-link">Home</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    <div id="search-container" class="col md-12">
        <h1>Seja bem vindo</h1>
    </div>

    <div id="products-container" class="col-md-12">
        <div id="cards-container" class="row">
            @foreach($products as $product)
            <div class="card col-md-3">
                <img src="/img/sem-imagem.png" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-name">{{ $product->name }}</h5>
                    <h5 class="card-name">R$: {{ $product->unity_price }}</h5>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multpart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->unity_price }}">
                        @auth
                        @if($product->max_quantity > 0)
                        <input type="number" class="form-control" name="quantity" value="0">
                        <button class="btn btn-primary mt-2">Comprar</button>
                        @endif
                        @endauth
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <footer>
        <p>Manager sistem &copy; 2023</p>
    </footer>
</body>

</html>