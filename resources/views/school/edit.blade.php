<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data School - aandhen.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('school.update', $school->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">FOTO</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">NAME</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', $school->name) }}" placeholder="Masukkan Nama School">
                                <!-- error message untuk name -->
                                @error('name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">ADDRESS</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address', $school->address) }}"
                                    placeholder="Masukkan Alamat School">
                                <!-- error message untuk address -->
                                @error('address')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">DESCRIPTION</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    name="description" rows="5"
                                    placeholder="Masukkan Deskripsi School">{{ old('description', $school->description) }}</textarea>
                                <!-- error message untuk description -->
                                @error('description')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">STATUS</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                    <option value="Negeri" {{ old('status', $school->status) == 'Negeri' ? 'selected' : '' }}>Negeri</option>
                                    <option value="Swasta" {{ old('status', $school->status) == 'Swasta' ? 'selected' : '' }}>Swasta</option>
                                </select>
                                <!-- error message untuk status -->
                                @error('status')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">PHONE</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone', $school->phone) }}"
                                    placeholder="Masukkan Nomor Telepon School">
                                <!-- error message untuk phone -->
                                @error('phone')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">EMAIL</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email', $school->email) }}"
                                    placeholder="Masukkan Email School">
                                <!-- error message untuk email -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">WEBSITE</label>
                                <input type="text" class="form-control @error('website') is-invalid @enderror"
                                    name="website" value="{{ old('website', $school->website) }}"
                                    placeholder="Masukkan Website School">
                                <!-- error message untuk website -->
                                @error('website')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">ACCREDITATION</label>
                                <select class="form-control @error('accreditation') is-invalid @enderror"
                                    name="accreditation">
                                    <option value="A" {{ old('accreditation', $school->accreditation) == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ old('accreditation', $school->accreditation) == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="C" {{ old('accreditation', $school->accreditation) == 'C' ? 'selected' : '' }}>C</option>
                                    <option value="Tidak Terakreditasi" {{ old('accreditation', $school->accreditation) == 'Tidak Terakreditasi' ? 'selected' : '' }}>Tidak
                                        Terakreditasi</option>
                                </select>
                                <!-- error message untuk accreditation -->
                                @error('accreditation')
                                    <div class="alert                                 <div class=" alert alert-danger mt-2">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>