<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 9 Import Export Excel & CSV File - TechvBlogs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
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
    <div class="container mt-5 text-center">
        <h2 class="mb-4">
            Detail : {{$excel->filename}}
        </h2>

        <table class="table table-striped">

            <tbody>
                @foreach($excel->excel_details as $excel)
                <tr>
                    <td> {{$excel->name}} </td>
                    <td> {{$excel->roll_number}} </td>
                    <td> {{$excel->class}} </td>
                    <td> {{$excel->department}} </td>
                    <td> {{$excel->title}} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>



</html>