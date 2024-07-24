@extends('layouts.app')
@section('title', 'Data Alumni')
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
            <div class="row align-items-center mb-3">
                <div class="col-md-10">
                    <h3 class="mb-0">Daftar Alumni ILMU KOMPUTER UNMUL</h3>
                </div>
                <div class="col-md-2 d-flex justify-content-end">
                    <div class="d-flex">
                        <a class="btn btn-success mr-2" href="{{ route('mahasiswa.create') }}">
                            <i class='fa fa-plus-circle'></i> Tambah Alumni
                        </a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-print"></i> Export
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item bg-success text-white" href="{{ route('mahasiswa.export.excel') }}"><i class="fa fa-file-excel-o"></i> Excel</a>
                                <a class="dropdown-item bg-danger text-white" href="{{ route('mahasiswa.export.pdf') }}" target="_blank"><i class="fa fa-file-pdf-o"></i> PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <hr>

        <form action="{{ route('mahasiswa.index') }}" method="GET">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Mahasiswa" value="{{ request('nama') }}" autocomplete="off">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="nim" class="form-control" placeholder="NIM" value="{{ request('nim') }}" autocomplete="off">
                </div>
                <div class="form-group col-md-2">
                    <select id="angkatan" name="angkatan" class="form-control">
                        <option value="">Angkatan</option>
                        <option value="2012" {{ request('angkatan') == '2012' ? 'selected' : '' }}>Angkatan 2012</option>
                        <option value="2013" {{ request('angkatan') == '2013' ? 'selected' : '' }}>Angkatan 2013</option>
                        <option value="2014" {{ request('angkatan') == '2014' ? 'selected' : '' }}>Angkatan 2014</option>
                        <option value="2015" {{ request('angkatan') == '2015' ? 'selected' : '' }}>Angkatan 2015</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <input type="text" name="judul" class="form-control" placeholder="Judul Skripsi" value="{{ request('judul') }}" autocomplete="off">
                </div>
                <div class="form-group col-md-2 d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-search"></i> Cari</button>
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</a>
                </div>
            </div>
        </form>
        <br>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <i class="fa fa-check-circle"></i> {{$message}}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="text-align: center;">No.</th>
                    <th style="text-align: center;">Foto</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Angkatan</th>
                    <th>Judul Skripsi</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswas as $mahasiswa)
                    <tr>
                        <td style="text-align: center;">{{$loop->iteration }}.</td>
                        <td style="text-align: center;">
                            @if($mahasiswa->foto)
                            <img src="{{ asset('storage/' . $mahasiswa->foto) }}" alt="Foto" width="100">
                            @else
                            -
                            @endif
                        </td>
                        <td>{{ $mahasiswa->namaMahasiswa }}</td>
                        <td>{{ $mahasiswa->nimMahasiswa }}</td>
                        <td>{{ $mahasiswa->angkatanMahasiswa }}</td>
                        <td>{{ $mahasiswa->judulskripsiMahasiswa }}</td>
                        <td style="text-align: center;">
                            <div class="btn-group" role="group" aria-label="Aksi">
                                <a class="btn btn-sm btn-info mr-1" href="{{ route('mahasiswa.show', $mahasiswa->id) }}" title="Detail">
                                    <i class='fa fa-eye'></i>
                                </a>
                                <a class="btn btn-sm btn-warning mr-1" href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" title="Edit">
                                    <i class='fa fa-edit'></i>
                                </a>
                                <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger mr-1" title="Hapus">
                                        <i class='fa fa-trash'></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center;">Tidak ada data mahasiswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {!! $mahasiswas->links() !!}
    </div>
    </body>

</html>

@endsection
