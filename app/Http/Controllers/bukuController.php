<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index(Request $request)
    {
        //
        $query = $request->get('search');
        $var = Buku::where('id_buku', 'LIKE', '%' . $query . '%')->orWhere('judul', 'LIKE', '%' . $query . '%')->paginate(2);
        return view('buku.index', compact('var', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $var = new Anggota;
        $var->nama = $request->nama;
        $var->alamat = $request->alamat;
        $var->tgl_lhr = $request->tgl_lhr;
        $var->tmp_lhr = $request->tmp_lhr;
        $var->j_kel = $request->j_kel;
        $var->status = $request->status;
        $var->no_tlp = $request->no_tlp;
        $var->ket = $request->ket;
        $var->save();
        return redirect('anggota');

        $this->validate($request,[
          'KodePlk' => 'required',
          'NamaPlk' => 'required',
        ]);
        $as = new Poliklinik;
        $as->KodePlk = $request->KodePlk;
        $as->NamaPlk = $request->NamaPlk;
        $ca = $request['KodePlk'];
        $ccd = Poliklinik::where('KodePlk', $ca)->value('KodePlk');
        if ($ccd==NULL) {
          $as->save();
          return redirect('poli')->with('message', 'Data Berhasil di tambahkan');
        }else{
          return redirect('poli/create')->with('message', 'Kode Poliklinik sudah tersedia, silahkan masukan Kode lain');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $var = Anggota::find($id);
        if(!$var){
            abort(404);
        }

        return view('anggota.edit')->with('var', $var);
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
        //
        $var = Anggota::find($id);
        $var->nama = $request->nama;
        $var->alamat = $request->alamat;
        $var->tgl_lhr = $request->tgl_lhr;
        $var->tmp_lhr = $request->tmp_lhr;
        $var->j_kel = $request->j_kel;
        $var->status = $request->status;
        $var->no_tlp = $request->no_tlp;
        $var->ket = $request->ket;
        $var ->save();
        return redirect('anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $var = Anggota::find($id);
        $var ->delete();
        return redirect('anggota');
    }
}
