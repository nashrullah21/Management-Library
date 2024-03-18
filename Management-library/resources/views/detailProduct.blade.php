<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Product Detail</title>
</head>

<body>
    <h1>Product Detail</h1>

    <div class="row">
        <div class="col-md-6">
            @if (isset($product))
                <img src="{{ 'images/' . $products->image }}" alt="{{ $products->title }}">
            @endif
        </div>
        <div class="col-md-6">
            @if (isset($products))
                <h2>{{ $products->title }}</h2>
                <p>stock:{{ $products->stock }}</p>

                <p>{{ $products->desc }}</p>
                <p>Price: {{ $products->price }}</p>

                @if ($products->stock > 0)
                    <form method="POST" action="{{ route('purchased') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" min="1" max="{{ $products->stock }}"
                            required>
                        <br>
                        <button type="submit" class="btn btn-primary">Buy Now</button>
                    </form>
                @else
                    <p class="text-danger">Out of Stock</p>
                @endif
            @else
                <p>Product not found.</p>
            @endif
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

</body>

</html>
