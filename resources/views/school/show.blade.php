<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data School - aandhen.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset($school->image) }}" class="rounded" style="width: 150px">
                        <hr>
                        <h4>{{ $school->name }}</h4>
                        <p><strong>address:</strong> {{ $school->address }}</p>
                        <p><strong>description:</strong> {{ $school->description }}</p>
                        <p><strong>status:</strong> {{ $school->status }}</p>
                        <p><strong>phone:</strong> {{ $school->phone }}</p>
                        <p><strong>email:</strong> {{ $school->email }}</p>
                        <p><strong>website:</strong> {{ $school->website }}</p>
                        <p><strong>accreditation:</strong> {{ $school->accreditation }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>