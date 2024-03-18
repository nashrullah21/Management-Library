<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Management Books</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('home') }}">Management Books</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>
                                    {{-- {{ Auth::user()->email }} <span class="caret"></span> --}}
                                </a>
                                <ul class="dropdown-menu">
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i> LogOut</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="card mt-5">
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
                                {{-- @if (!empty($product)) --}}
                                @foreach ($products as $p)
                                    <tr>
                                        <td>{{ $p->title }}</td>
                                        <td><img src="{{ 'images/' . $p->image }}" alt="{{ $p->title }}"></td>
                                        </td>
                                        <td>{{ $p->stock }}</td>
                                        <td>{{ $p->price }}</td>
                                        <td>{{ $p->desc }}</td>
                                        <td>
                                            <a href="/product/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
                                            <a href="/product/delete/{{ $p->id }}"
                                                class="btn btn-danger">delete</a>
                                            <a href="/detail-product/{{ $p->id }}"
                                                class="btn btn-success">buy</a>
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- @endif --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @yield('konten')

        </div>
    </div>
    </div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>
