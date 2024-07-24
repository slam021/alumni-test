@extends('layouts.app')
@section('title', 'Daftar Pekerjaan')
@section('content')

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- <title>Data Pekerjaan</title> --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3> Daftar Pekerjaan</h3>
            </div>
            <div class="col-sm-1">
                <a class="btn btn-success" href="{{ route('pekerjaan.create')}}"><i class='fa fa-plus-circle'></i> Tambah Pekerjaan </a>
            </div>
        </div>
        <hr>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <i class="fa fa-check-circle"></i> {{$message}}
            </div>
        @endif

        <form method="GET" action="{{ route('pekerjaan.index') }}">
            <div class="form-row align-items-end">
                <div class="form-group col-md-3">
                    <input type="text" name="namaAlumni" class="form-control" placeholder="Nama Alumni" value="{{ request('namaAlumni') }}" autocomplete="off">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="namaPekerjaan" class="form-control" placeholder="Nama Pekerjaan" value="{{ request('namaPekerjaan') }}" autocomplete="off">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" name="alamatPekerjaan" class="form-control" placeholder="Alamat Pekerjaan" value="{{ request('alamatPekerjaan') }}" autocomplete="off">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="noTelpPekerjaan" class="form-control" placeholder="No Telp Pekerjaan" value="{{ request('noTelpPekerjaan') }}" autocomplete="off">
                </div>
                <div class="form-group col-md-2 d-flex align-items-center">
                    <button type="submit" class="btn btn-primary mr-3 ml-3"><i class="fa fa-search"></i> Cari</button>
                    <a href="{{ route('pekerjaan.index') }}" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</a>
                </div>
            </div>
        </form>
        <br>

        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th style="text-align: center;">No.</th>
                    <th>Nama Alumni</th>
                    <th>Nama Pekerjaan</th>
                    <th>Alamat Pekerjaan</th>
                    <th>No Telp Pekerjaan</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pekerjaans as $pekerjaan)
                    <tr>
                        <td style="text-align: center;">{{ $loop->iteration }}.</td>
                        <td>{{ $pekerjaan->mahasiswa->namaMahasiswa }}</td>
                        <td>{{ $pekerjaan->namaPekerjaan }}</td>
                        <td>{{ $pekerjaan->alamatPekerjaan }}</td>
                        <td>{{ $pekerjaan->noTelpPekerjaan }}</td>
                        <td style="text-align: center;">
                            <div class="btn-group" role="group" aria-label="Aksi">
                                <a class="btn btn-sm btn-info mr-1" href="{{ route('pekerjaan.show', $pekerjaan->id) }}" title="Detail">
                                    <i class='fa fa-eye'></i>
                                </a>
                                <a class="btn btn-sm btn-warning mr-1" href="{{ route('pekerjaan.edit', $pekerjaan->id) }}" title="Edit">
                                    <i class='fa fa-edit'></i>
                                </a>
                                <form action="{{ route('pekerjaan.destroy', $pekerjaan->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class='fa fa-trash'></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center;">Tidak ada data pekerjaan.</td>
                    </tr>
                @endforelse
        </tbody>
    </table>
    {!! $pekerjaans->links() !!}
    </div>
    </body>
</html>

@endsection
