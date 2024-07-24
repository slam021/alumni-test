@extends('layouts.app')
@section('title', 'Tambah Alumni')
@section('content')

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class=" form-row">
            <div class="col-lg-12">
                <h3>Tambah Alumni Mahasiswa</h3>
            </div>
        </div>
        <br>

        @if ($errors->any())
            <div class="alert alert-danger">
                <i class="fa fa-warning"></i> <strong>Whoops! </strong> Ada permasalahan inputanmu.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('mahasiswa.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="namaMahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" name="namaMahasiswa" class="form-control" id="namaMahasiswa" value="{{ old('namaMahasiswa') }}" placeholder="Masukkan Nama Mahasiswa..." autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="nimMahasiswa" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" name="nimMahasiswa" class="form-control" id="nimMahasiswa" value="{{ old('nimMahasiswa') }}" placeholder="Masukkan NIM Mahasiswa..." autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="angkatanMahasiswa" class="col-sm-2 col-form-label">Angkatan Mahasiswa</label>
                <div class="col-sm-10">
                    <select id="angkatanMahasiswa" name="angkatanMahasiswa"class="form-control">
                        <option value="">Pilih Angkatan...</option>
                        <option value="2012"> Angkatan 2012</option>
                        <option value="2013"> Angkatan 2013</option>
                        <option value="2014"> Angkatan 2014</option>
                        <option value="2015"> Angkatan 2015</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="judulskripsiMahasiswa" class="col-sm-2 col-form-label">Judul Skripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="judulskripsiMahasiswa" rows="8" cols="80" placeholder="Masukkan Judul Skripsi..." autocomplete="off">{{ old('judulskripsiMahasiswa') }}</textarea>
                    </div>
            </div>
            <div class="form-group row">
                <label for="pembimbing1" class="col-sm-2 col-form-label">Pembimbing 1</label>
                <div class="col-sm-10">
                    <input type="text" name="pembimbing1" class="form-control" id="pembimbing1" value="{{ old('pembimbing1') }}" placeholder="Masukkan Pembimbing 1..." autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="pembimbing2" class="col-sm-2 col-form-label">Pembimbing 2</label>
                <div class="col-sm-10">
                    <input type="text" name="pembimbing2" class="form-control" id="pembimbing2" value="{{ old('pembimbing2') }}" placeholder="Masukkan Pembimbing 2..." autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="foto" class="col-sm-2 col-form-label">Pilih Foto</label>
                <div class="col-sm-10">
                    <input type="file" name="foto" id="foto" value="{{ old('foto') }}">
                <p class="text-danger">{{ $errors->first('foto') }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="ijazah" class="col-sm-2 col-form-label">Pilih Ijazah</label>
                <div class="col-sm-10">
                    <input type="file" name="ijazah" id="ijazah" value="{{ old('ijazah') }}">
                    <p class="text-danger">{{ $errors->first('ijazah') }}</p>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary float-right"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            </div>
        </form>

    </div>
    </body>
</html>

@endsection
