<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 9 Import Export Excel & CSV File - TechvBlogs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5 text-center">
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            @if (isset($errors) && $errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach
            </div>
            @endif
        </div>
        <h2 class="mb-4">
            Excel & CSV File
        </h2>

        <form action="{{ route('excel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>

                <button class="btn btn-primary mt-3">Upload file </button>

            </div>
        </form>



        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">FileName</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($excels as $excel)
                <tr>
                    <td>
                        <a href="{{ route('excel.show', ['excel' => $excel]) }}">{{$excel->filename}}</a>
                    </td>
                    <td>
                        {{$excel->updated_at}}
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

        <div class="d-flex justify-content-center">
            {!! $excels->links('pagination') !!}
        </div>

    </div>
</body>



</html>