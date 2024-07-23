@extends('layouts.app')
@section('content')

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Pekerjaan</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class=" form-row">
            <div class="col-lg-12">
                <h3>Tambah Pekerjaan</h3>
            </div>
        </div>
        <br>

        @if ($errors->all())
            <div class="alert alert-danger">
                <strong>Whoops! </strong> Ada permasalahan inputanmu.<br>
                <ul>
                    @foreach ($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{route('pekerjaan.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- <div class="form-group row">
                <label for="namaMahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" name="namaMahasiswa" class="form-control" id="namaMahasiswa" placeholder="Nama Mahasiswa">
                </div>
            </div> --}}
            <div class="form-group row">
                <label for="namaPekerjaan" class="col-sm-2 col-form-label">Nama Pekerjaan</label>
                <div class="col-sm-10">
                    <input type="text" name="namaPekerjaan" class="form-control" id="namaPekerjaan" placeholder="Masukkan Nama Pekerjaan...">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamatPekerjaan" class="col-sm-2 col-form-label">Alamat Pekerjaan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="alamatPekerjaan" rows="8" cols="80" placeholder="Masukkan Alamat Pekerjaan..."></textarea>
                    </div>
            </div>
            <div class="form-group row">
                <label for="noTelpPekerjaan" class="col-sm-2 col-form-label">No Telp Pekerjaan</label>
                <div class="col-sm-10">
                    <input type="number" name="noTelpPekerjaan" class="form-control" id="noTelpPekerjaan" placeholder="Masukkan No Telp Pekerjaan...">
                </div>
            </div>
            <div class="form-group row">
                <label for="mahasiswaId" class="col-sm-2 col-form-label">Nama Alumni</label>
                <div class="col-sm-10">
                    <select id="mahasiswaId" name="mahasiswaId"class="form-control">
                        <option value=""></option>
                        @foreach ($mahasiswas as $mahasiswa)
                            <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->namaMahasiswa }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
                <div class="form-group">
                    <a href="{{route('pekerjaan.index')}}" class="btn btn-success">Kembali</a>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
        </form>

    </div>
    </body>
</html>
    
@endsection