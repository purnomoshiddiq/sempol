<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('admin.data-buku', compact('buku'));
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);
        if($request->hasFile('gbr_sampul')){
            // upload file sampul
            $file = $request->file('gbr_sampul');
            $gbr_sampul = time() . '_' . $file->getClientOriginalName();
            $file->move('cover/', $gbr_sampul);
        };
        if ($request->hasFile('file'))
        {
             // upload file lampiran
             $file = $request->file('file');
             $filename = time() . '_' . $file->getClientOriginalName();
             $file->move('berkas/', $filename);
        }

        $buku = Buku::create([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'isbn' => $request->isbn,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'tempat_terbit' => $request->tempat_terbit,
            'gbr_sampul' => $gbr_sampul,
            'file' => $filename
        ]);
         // return data buku;
         if ($buku) {
            Alert::success('Sukses', 'Data Buku berhasil ditambah.');
            return redirect('/data-buku');
            // return redirect()->back()->with('success', 'dokumen berhasil ditambah');
        } else {
            return redirect()->back()->with('error', 'data buku gagal ditambah');
        }

    }

    public function anggota()
    {
        $anggota = Anggota::all();
        return view('admin.data-anggota', compact('anggota'));
    }

    public function delete($id)
    {
        $delete = Anggota::find($id)->delete();
        if($delete)
        {
            Alert::success('Sukses', 'Annggota berhasil dihapus.');
            return redirect('/data-anggota');   
        }
    }

    public function pinjaman()
    {
        return view('admin.data-pinjaman');
    }

}
