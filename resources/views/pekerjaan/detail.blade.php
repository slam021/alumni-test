@extends('layouts.app')
@section('title', 'Detail Pekerjaan')
@section('content')

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- <title>Data Alumni</title> --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Detail Pekerjaan</h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="namaPekerjaan" class="col-sm-2 col-form-label">Nama Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" name="namaPekerjaan" class="form-control" id="namaPekerjaan" value="{{$pekerjaan->namaPekerjaan}}" placeholder="Nama Pekerjaan" autocomplete="off" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamatPekerjaan" class="col-sm-2 col-form-label">Alamat Pekerjaan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="alamatPekerjaan" id="alamatPekerjaan" rows="8" cols="80" placeholder="Masukkan Alamat Pekerjaan..." autocomplete="off" disabled>{{$pekerjaan->alamatPekerjaan}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="noTelpPekerjaan" class="col-sm-2 col-form-label">No Telp Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="number" name="noTelpPekerjaan" class="form-control" id="noTelpPekerjaan" value="{{$pekerjaan->noTelpPekerjaan}}" placeholder="Masukkan No Telp Pekerjaan..." autocomplete="off" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mahasiswaId" class="col-sm-2 col-form-label">Nama Alumni</label>
                    <div class="col-sm-10">
                        <select id="mahasiswaId" name="mahasiswaId" class="form-control" disabled>
                            <option value="">Pilih Nama Alumni...</option>
                            @foreach ($mahasiswas as $mahasiswa)
                                <option value="{{ $mahasiswa->id }}" {{ $pekerjaan->mahasiswaId == $mahasiswa->id ? 'selected' : '' }}>
                                    {{ $mahasiswa->namaMahasiswa }}
                                </option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <br>
                <a href="{{ route('pekerjaan.index') }}" class="btn btn-secondary float-right"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                {{-- <a href="{{ route('pekerjaan.edit', $pekerjaan->id) }}" class="btn btn-primary">Edit</a> --}}
        </div>
    </div>
</body>
</html>

@endsection
