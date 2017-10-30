<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distributor;

class distriController extends Controller
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
        $var = Distributor::where('id_distributor', 'LIKE', '%' . $query . '%')->orWhere('nama_distributor', 'LIKE', '%' . $query . '%')->paginate(2);
        return view('distributor.index', compact('var', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('distributor.create');
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
           'nama_distributor' => 'required',
           'alamat' => 'required',
           'telepon' => 'required',
        ]);

        $var = new Distributor;
        $var->nama_distributor = $request->nama_distributor;
        $var->alamat = $request->alamat;
        $var->telepon = $request->telepon;

        $validation = $request['nama_distributor'];
        $validator = Distributor::where('nama_distributor', $validation)->value('nama_distributor');
        if($validator == NULL){
            $var->save();
            return redirect('distributor')->with('message', 'Data Berhasil di tambahkan');
        } else {
            return redirect('distributor/create')->with('message', 'Distributor sudah terdaftar, silahkan masukan Distributor lain');
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
        $var = Distributor::find($id);
        if(!$var){
            abort(404);
        }

        return view('distributor.edit')->with('var', $var);}

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
        $var = Distributor::find($id);
        $var->nama_distributor = $request->nama_distributor;
        $var->alamat = $request->alamat;
        $var->telepon = $request->telepon;
        $var->save();
        return redirect('distributor')->with('message', 'Data Berhasil di Edit');}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $var = Distributor::find($id);
        $var ->delete();
        return redirect('distributor');
    }
}
