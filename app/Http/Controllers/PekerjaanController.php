<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;
use App\Pekerjaan;

class PekerjaanController extends Controller
{
    public function index(){
        $pekerjaans = Pekerjaan::orderBy('id','asc')->paginate(5);

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
        return redirect()->route('pekerjaan.index')
                        ->with('success','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        return view('pekerjaan.edit', compact('pekerjaan'));
    }
}