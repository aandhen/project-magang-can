<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Posts - Student Bandung</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-left my-1">SCHOOL BANDUNG</h3>
                    {{-- <h5 class="text-center"><a href="https://santrikoding.com">www.kedaieskrimbandung.com</a></h5>  --}}        
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('school.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">NAMA</th>
                                <th scope="col">ADDRESS</th>
                                {{-- <th scope="col">DECRIPTION</th> --}}
                                <th scope="col">STATUS</th>
                                <th scope="col">PHONE</th>
                                {{-- <th scope="col">EMAIL</th> --}}
                                <th scope="col">WEBSITE</th>
                                <th scope="col">ACCREDITATION</th>
                                <th scope="col">IMAGE</th>                             
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($schools as $school)
                                <tr>
                                    
                                    <td>{{$school->name }}</td>
                                    <td>{{$school->address }}</td>
                                    {{-- <td>{{$school->description }}</td> --}}
                                    <td>{{$school->status}}</td>
                                    <td>{{$school->phone}}</td>
                                    {{-- <td>{{$school->email}}</td> --}}
                                    <td>{{$school->website}}</td>
                                    <td>{{$school->accreditation}}</td>
                                    <td class="text-center">
                                        <img src="{{ asset($school->image) }}" class="rounded" style="width: 150px">
                                    </td>
                                    


                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('school.destroy', $school->id) }}" method="POST">
                                            <a href="{{ route('school.show', $school->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('school.edit', $school->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $schools->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>