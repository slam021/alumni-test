{{-- @inject('SystemDocument', 'App\Http\Controllers\SystemDocumentController' ) --}}
<table style="width: 100%">
    <thead>
        <tr>
            <th><b>Export Excel Data Alumni</b></th>
        </tr>
        <tr>
            <th><b>Dicetak pada : {{$waktu_sekarang}}</b></th>
        </tr>
    </thead>
</table>
<table style="width: 100%">
    <thead>
        <tr style="background-color: yellow;  border-collapse: collapse;">
            <th scope="col" style="background-color: yellow; text-align: center; width: 1cm; border: 1px solid black;">No.</th>
            <th scope="col" style="background-color: yellow; text-align: center; width: 5cm; border: 1px solid black;">Nama Mahasiswa</th>
            <th scope="col" style="background-color: yellow; text-align: center; width: 3cm; border: 1px solid black;">NIM</th>
            <th scope="col" style="background-color: yellow; text-align: center; width: 3cm; border: 1px solid black;">Angkatan</th>
            <th scope="col" style="background-color: yellow; text-align: center; width: 7cm; border: 1px solid black;">Judul Skripsi</th>
            <th scope="col" style="background-color: yellow; text-align: center; width: 3cm; border: 1px solid black;">Pembimbing 1</th>
            <th scope="col" style="background-color: yellow; text-align: center; width: 3cm; border: 1px solid black;">Pembimbing 2</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswas as $key => $mahasiswa )
            <tr>
                <td style="text-align: center; border: 1px solid black;">{{$key+1}}.</td>
                <td style="text-align: left; border: 1px solid black;">{{$mahasiswa->namaMahasiswa}}</td>
                <td style="text-align: left; border: 1px solid black;">{{$mahasiswa->nimMahasiswa}}</td>
                <td style="text-align: left; border: 1px solid black;">{{$mahasiswa->angkatanMahasiswa}}</td>
                <td style="text-align: left; border: 1px solid black;">{{$mahasiswa->judulskripsiMahasiswa}}</td>
                <td style="text-align: left; border: 1px solid black;">{{$mahasiswa->pembimbing1}}</td>
                <td style="text-align: left; border: 1px solid black;">{{$mahasiswa->pembimbing2}}</td>
        @endforeach
    </tbody>
</table>
