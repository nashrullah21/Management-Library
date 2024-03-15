<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <title>add Product</title>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                CRUD Data Product - <strong>TAMBAH DATA</strong>
            </div>
            <div class="card-body">
                <a href="/product" class="btn btn-primary">Kembali</a>
                <br />
                <br />

                <form method="post" action="/add/product">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="title product ..">

                        @if ($errors->has('title'))
                            <div class="text-danger">
                                {{ $errors->first('title') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>image</label>
                        <textarea name="image" class="form-control" placeholder="image product .."></textarea>

                        @if ($errors->has('image'))
                            <div class="text-danger">
                                {{ $errors->first('image') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>stock</label>
                        <textarea name="stock" class="form-control" placeholder="stock product .."></textarea>

                        @if ($errors->has('stock'))
                            <div class="text-danger">
                                {{ $errors->first('stock') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>price</label>
                        <textarea name="price" class="form-control" placeholder="price product .."></textarea>

                        @if ($errors->has('price'))
                            <div class="text-danger">
                                {{ $errors->first('price') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>desc</label>
                        <textarea name="desc" class="form-control" placeholder="description .."></textarea>

                        @if ($errors->has('desc'))
                            <div class="text-danger">
                                {{ $errors->first('desc') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>

                </form>

            </div>
        </div>
    </div>
</body>

</html>
