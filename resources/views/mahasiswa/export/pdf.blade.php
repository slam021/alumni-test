<!DOCTYPE html>
<html>
<head>
    <title>Daftar Alumni Mahasiswa</title>
    <style>
        body {
            font-size: 10px;
            font-family: Arial, sans-serif;
            position: relative;
            min-height: 100vh;
            margin: 0;
            padding-bottom: 40px; /* Space for footer */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 4px;
            text-align: left;
        }
        th {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <h1>Daftar Alumni Mahasiswa</h1>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Angkatan</th>
                <th>Judul Skripsi</th>
                <th>Pembimbing 1</th>
                <th>Pembimbing 2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $key => $mahasiswa)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $mahasiswa->namaMahasiswa }}</td>
                    <td>{{ $mahasiswa->nimMahasiswa }}</td>
                    <td>{{ $mahasiswa->angkatanMahasiswa }}</td>
                    <td>{{ $mahasiswa->judulskripsiMahasiswa }}</td>
                    <td>{{ $mahasiswa->pembimbing1 }}</td>
                    <td>{{ $mahasiswa->pembimbing2 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <strong><em>Dicetak pada : {{ $waktu_sekarang }}</em></strong>
    </div>
</body>
</html>
