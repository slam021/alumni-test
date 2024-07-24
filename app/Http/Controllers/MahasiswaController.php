<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MahasiswaExport;
use Barryvdh\DomPDF\Facade as PDF;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Mahasiswa::query();

        if ($request->filled('nama')) {
            $query->where('namaMahasiswa', 'like', '%' . $request->nama . '%');
        }

        if ($request->filled('nim')) {
            $query->where('nimMahasiswa', 'like', '%' . $request->nim . '%');
        }

        if ($request->filled('angkatan')) {
            $query->where('angkatanMahasiswa', 'like', '%' . $request->angkatan . '%');
        }

        if ($request->filled('judul')) {
            $query->where('judulskripsiMahasiswa', 'like', '%' . $request->judul . '%');
        }

        $mahasiswas = $query->orderBy('id','asc')->paginate(5);

        return view('mahasiswa.index',compact('mahasiswas'))->with('i',(request()->input('page',1) -1)*5);
    }

    public function exportExcel()
    {
        return Excel::download(new MahasiswaExport, 'data_alumni.xlsx');
    }

    public function exportPdf()
    {
        $mahasiswas = Mahasiswa::orderBy('id','asc')->get();
        $waktu_sekarang = date('d/m/Y - h:i:s');
        $pdf = PDF::loadView('mahasiswa.export.pdf', compact('mahasiswas', 'waktu_sekarang'));
        return $pdf->stream('data_alumni.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'namaMahasiswa'=>'required',
            'nimMahasiswa' => 'required',
            'angkatanMahasiswa'=>'required',
            'judulskripsiMahasiswa' => 'required',
            'pembimbing1'=>'required',
            'pembimbing2' => 'required',
            'foto' => 'nullable|mimes:jpeg,png,jpg|max:1024',
            'ijazah' => 'nullable|mimes:pdf|max:1024',
        ]);

        $mahasiswa = new Mahasiswa($request->except(['foto', 'ijazah']));

        if ($request->hasFile('foto')) {
            $fotoName = 'foto_' . time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $mahasiswa->foto = $request->file('foto')->storeAs('foto_mahasiswa', $fotoName, 'public');
        }

        if ($request->hasFile('ijazah')) {
            $ijazahName = 'ijazah_' . time() . '.' . $request->file('ijazah')->getClientOriginalExtension();
            $mahasiswa->ijazah = $request->file('ijazah')->storeAs('ijazah_mahasiswa', $ijazahName, 'public');
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.detail', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaMahasiswa'=>'required',
            'nimMahasiswa' => 'required',
            'angkatanMahasiswa'=>'required',
            'judulskripsiMahasiswa' => 'required',
            'pembimbing1'=>'required',
            'pembimbing2' => 'required',
            'foto' => 'nullable|mimes:jpeg,png,jpg|max:1024',
            'ijazah' => 'nullable|mimes:pdf|max:1024',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->fill($request->except(['foto', 'ijazah']));

        if ($request->hasFile('foto')) {
            if ($mahasiswa->foto) {
                Storage::disk('public')->delete($mahasiswa->foto);
            }
            $fotoName = 'foto_' . time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $mahasiswa->foto = $request->file('foto')->storeAs('foto_mahasiswa', $fotoName, 'public');
        }

        if ($request->hasFile('ijazah')) {
            if ($mahasiswa->ijazah) {
                Storage::disk('public')->delete($mahasiswa->ijazah);
            }
            $ijazahName = 'ijazah_' . time() . '.' . $request->file('ijazah')->getClientOriginalExtension();
            $mahasiswa->ijazah = $request->file('ijazah')->storeAs('ijazah_mahasiswa', $ijazahName, 'public');
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data Alumni berhasil dihapus');
    }
}
