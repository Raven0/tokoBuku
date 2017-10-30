<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\Buku;
use App\Kasir;

class jualController extends Controller
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
        $var = Penjualan::where('id_penjualan', 'LIKE', '%' . $query . '%')->orWhere('jumlah', 'LIKE', '%' . $query . '%')->paginate(2);
        return view('jual.index', compact('var', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $K = Buku::all();
        $A = Kasir::all();
        return view('jual.create')->with('buku' ,$K)->with('kasir' ,$A);
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
           'id_kasir' => 'required',
           'id_buku' => 'required',
           'jumlah' => 'required',
           'total' => 'required',
           'tanggal' => 'required'
        ]);

        $var = new Penjualan;
        $var->id_kasir = $request->id_kasir;
        $var->id_buku = $request->id_buku;
        $var->jumlah = $request->jumlah;
        $var->total = $request->total;
        $var->tanggal = $request->tanggal;

        $var->save();
        return redirect('jual')->with('message', 'Data Berhasil di tambahkan');
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
        $var = Penjualan::find($id);
        $K = Buku::all();
        $A = Kasir::all();

        if(!$var){
            abort(404);
        }

        return view('jual.edit')->with('var', $var)->with('buku' ,$K)->with('kasir' ,$A);
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
        $var = Penjualan::find($id);
        $var->id_kasir = $request->id_kasir;
        $var->id_buku = $request->id_buku;
        $var->jumlah = $request->jumlah;
        $var->total = $request->total;
        $var->tanggal = $request->tanggal;

        $var->save();
        return redirect('jual')->with('message', 'Data Berhasil di Edit');
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
        $var = Penjualan::find($id);
        $var ->delete();
        return redirect('jual');
    }
}
