<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabKomputer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LabKomputerController extends Controller
{
    public function index()
    {
        $komputers = LabKomputer::where('kondisi', 'Baik')->get();
        return view('index', [
            'title' => 'lab-komputer',
            'komputers' => $komputers,
        ]);
    }

    public function create()
    {
        return view("laptop.create", [
            'title' => 'create',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_komputer' => 'required',
            // 'ruang_penempatan' =>'required',
            'merk_komputer' => 'required',
            'kondisi' => 'required',
        ], [
            'no_komputer.required' => 'Komputer ID belum di isi',
            // 'ruang_penempatan.required' => 'Ruang penempatan belum di isi',
            'merk_komputer.required' => 'Merk Komputer belum di isi',
            'kondisi' => 'Kondisi komputer belum di isi',
        ]);

        LabKomputer::create([
            'no_komputer' => $request->no_komputer,
            // 'ruang_penempatan' => $request->ruang_penempatan,
            'merk_komputer' => $request->merk_komputer, 
            'kondisi' => $request->kondisi,
        ]);

        return redirect()->route('lab-komputer.index')->with('success','Berhasil menambahkan data komputer!');

    }

    public function edit($id)
    {
        $labKomputer = LabKomputer::find($id);

        return view('laptop.edit', compact('labKomputer'));
    }

    public function update($id, Request $request)
    {
        $labKomputer = LabKomputer::find($id);
        $labKomputer->update($request->all());

        $request->validate([
            'no_komputer' => 'required',
            // 'ruang_penempatan' =>'required',
            'merk_komputer' => 'required',
            // 'kondisi' => 'required',
        ],  [
            'no_komputer.required' => 'Komputer ID belum di isi',
            // 'ruang_penempatan.required' => 'Ruang penempatan belum di isi',
            'merk_komputer.required' => 'Merk Komputer belum di isi',
            // 'kondisi' => 'Kondisi komputer belum di isi',
        ]);

        LabKomputer::where('id', $id)->update([
            'no_komputer' => $request->no_komputer,
            // 'ruang_penempatan' => $request->ruang_penempatan,
            'merk_komputer' => $request->merk_komputer,
            // 'kondisi' => $request->kondisi,
        ]);
         
        Session::flash('success', 'Data berhasil dirubah'); 

        return redirect()->route('lab-komputer.index');
    }

    public function destroy($id)
    {
        $labKomputer = LabKomputer::find($id);
        $labKomputer->delete();
         
        Session::flash('success', 'Data berhasil dihapus'); 

        return redirect()->back();
    }
}
