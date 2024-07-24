<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;
use App\Pekerjaan;

class PekerjaanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pekerjaan::query();

        if ($request->filled('namaAlumni')) {
            $query->whereHas('mahasiswa', function ($q) use ($request) {
                $q->where('namaMahasiswa', 'like', '%' . $request->namaAlumni . '%');
            });
        }

        if ($request->filled('namaPekerjaan')) {
            $query->where('namaPekerjaan', 'like', '%' . $request->namaPekerjaan . '%');
        }

        if ($request->filled('alamatPekerjaan')) {
            $query->where('alamatPekerjaan', 'like', '%' . $request->alamatPekerjaan . '%');
        }

        if ($request->filled('noTelpPekerjaan')) {
            $query->where('noTelpPekerjaan', 'like', '%' . $request->noTelpPekerjaan . '%');
        }

        $pekerjaans = $query->orderBy('id','asc')->paginate(5);

        return view('pekerjaan.index',compact('pekerjaans'))->with('i',(request()->input('page',1) -1)*5);
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        // dd($mahasiswas);
        return view('pekerjaan.create', compact('mahasiswas'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'namaPekerjaan'=>'required',
            'alamatPekerjaan' => 'required',
            'noTelpPekerjaan'=>'required',
            'mahasiswaId' => 'required',
        ]);

        Pekerjaan::create($request->all());
        return redirect()->route('pekerjaan.index')->with('success','Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $pekerjaan = Pekerjaan::findOrfail($id);
        $mahasiswas = Mahasiswa::all();

        return view('pekerjaan.detail', compact('pekerjaan','mahasiswas'));
    }

    public function edit($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $mahasiswas = Mahasiswa::all();

        // dd($pekerjaan);
        return view('pekerjaan.edit', compact('pekerjaan', 'mahasiswas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaPekerjaan'=>'required',
            'alamatPekerjaan' => 'required',
            'noTelpPekerjaan'=>'required',
            'mahasiswaId' => 'required',
        ]);

        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan->namaPekerjaan = $request->get('namaPekerjaan');
        $pekerjaan->alamatPekerjaan = $request->get('alamatPekerjaan');
        $pekerjaan->noTelpPekerjaan = $request->get('noTelpPekerjaan');
        $pekerjaan->mahasiswaId = $request->get('mahasiswaId');
        $pekerjaan->save();
        return redirect()->route('pekerjaan.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $pekerjaan = Pekerjaan::findOrfail($id);
        $pekerjaan->delete();
        return redirect()->route('pekerjaan.index') ->with('success', 'Data Pekerjaan berhasil dihapus');
    }
}
