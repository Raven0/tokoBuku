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
        $this->validate($request, [
           'noisbn' => 'required',
           'judul' => 'required',
           'penulis' => 'required',
           'penerbit' => 'required',
           'tahun' => 'required',
           'stok' => 'required',
           'harga_pokok' => 'required',
           'harga_jual' => 'required',
           'ppn' => 'required',
           'diskon' => 'required',
        ]);

        $var = new Buku;
        $var->noisbn = $request->noisbn;
        $var->judul = $request->judul;
        $var->penulis = $request->penulis;
        $var->penerbit = $request->penerbit;
        $var->tahun = $request->tahun;
        $var->stok = $request->stok;
        $var->harga_pokok = $request->harga_pokok;
        $var->harga_jual = $request->harga_jual;
        $var->ppn = $request->ppn;
        $var->diskon = $request->diskon;
        $validation = $request['judul'];
        $validator = Buku::where('judul', $validation)->value('judul');
        if($validator == NULL){
            $var->save();
            return redirect('buku')->with('message', 'Data Berhasil di tambahkan');
        } else {
            return redirect('buku/create')->with('message', 'Buku sudah terdaftar, silahkan masukan buku lain');
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
        $var = Buku::find($id);
        if(!$var){
            abort(404);
        }

        return view('buku.edit')->with('var', $var);
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
        $var = Buku::find($id);
        $var->noisbn = $request->noisbn;
        $var->judul = $request->judul;
        $var->penulis = $request->penulis;
        $var->penerbit = $request->penerbit;
        $var->tahun = $request->tahun;
        $var->stok = $request->stok;
        $var->harga_pokok = $request->harga_pokok;
        $var->harga_jual = $request->harga_jual;
        $var->ppn = $request->ppn;
        $var->diskon = $request->diskon;
        $var->save();
        return redirect('buku')->with('message', 'Data Berhasil di Edit');
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
        $var = Buku::find($id);
        $var ->delete();
        return redirect('buku');
    }
}
