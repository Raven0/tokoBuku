<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasok;
use App\Buku;
use App\Distributor;

class pasokController extends Controller
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
        $var = Pasok::where('id_pasok', 'LIKE', '%' . $query . '%')->orWhere('jumlah', 'LIKE', '%' . $query . '%')->paginate(2);
        return view('pasok.index', compact('var', 'query'));
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
        $A = Distributor::all();
        return view('pasok.create')->with('buku' ,$K)->with('distributor' ,$A);
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
           'id_distributor' => 'required',
           'id_buku' => 'required',
           'jumlah' => 'required',
           'tanggal' => 'required'
        ]);

        $var = new Pasok;
        $var->id_distributor = $request->id_distributor;
        $var->id_buku = $request->id_buku;
        $var->jumlah = $request->jumlah;
        $var->tanggal = $request->tanggal;

        $validation = $request['id_buku'];
        $validator = Pasok::where('id_buku', $validation)->value('id_buku');
        if($validator == NULL){
            $var->save();
            return redirect('pasok')->with('message', 'Data Berhasil di tambahkan');
        } else {
            return redirect('pasok/create')->with('message', 'Pasok sudah terdaftar!');
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
        $var = Pasok::find($id);
        $K = Buku::all();
        $A = Distributor::all();

        if(!$var){
            abort(404);
        }

        return view('pasok.edit')->with('var', $var)->with('buku' ,$K)->with('distributor' ,$A);
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
        $var = Pasok::find($id);
        $var->id_distributor = $request->id_distributor;
        $var->id_buku = $request->id_buku;
        $var->jumlah = $request->jumlah;
        $var->tanggal = $request->tanggal;
        $var->save();
        return redirect('pasok')->with('message', 'Data Berhasil di Edit');
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
        $var = Pasok::find($id);
        $var ->delete();
        return redirect('pasok');
    }
}
