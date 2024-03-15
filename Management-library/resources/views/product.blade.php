<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Product</title>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                CRUD Product
            </div>
            <div class="card-body">
                <a href="/addProduct" class="btn btn-primary">Product</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>title</th>
                            <th>image</th>
                            <th>stock</th>
                            <th>price</th>
                            <th>desc</th>

                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if (!empty($products)) --}}
                        @foreach ($product as $p)
                            <tr>
                                <td>{{ $p->title }}</td>
                                <td>{{ $p->image }}</td>
                                <td>{{ $p->stock }}</td>
                                <td>{{ $p->price }}</td>
                                <td>{{ $p->desc }}</td>

                                <td>
                                    <a href="/product/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
                                    <a href="/product/delete/{{ $p->id }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                        {{-- @endif --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
