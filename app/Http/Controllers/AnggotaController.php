<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\AnggotaImport;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class AnggotaController extends Controller
{
    public function import(Request $request)
    {
        // dd($request->all());
        // die();
         Excel::import(new AnggotaImport, $request->file('file'));
            Alert::success('Sukses', 'Anggota berhasil ditambah.');
            return redirect('/data-anggota');
            // return redirect()->back()->with('success', 'dokumen berhasil ditambah');
       
        
    }
}
