<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kasir;
use App\User;

class kasirController extends Controller
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
        $var = Kasir::where('id_kasir', 'LIKE', '%' . $query . '%')->orWhere('nama', 'LIKE', '%' . $query . '%')->paginate(2);
        return view('kasir.index', compact('var', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kasir.create');
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
           'nama' => 'required',
           'alamat' => 'required',
           'telepon' => 'required',
           'username' => 'required',
           'password' => 'required',
           'email' => 'required',
        ]);

        $var = new Kasir;
        $var->nama = $request->nama;
        $var->alamat = $request->alamat;
        $var->telepon = $request->telepon;
        $var->username = $request->username;
        $var->password = $request->password;

        $vara = new User;
        $vara->name = $request->nama;
        $vara->email = $request->email;
        $vara->password = bcrypt($request->password);
        $vara->role = "KASIR";

        $validation = $request['nama'];
        $validator = Kasir::where('nama', $validation)->value('nama');
        if($validator == NULL){
            $var->save();
            $vara->save();
            return redirect('kasir')->with('message', 'Data Berhasil di tambahkan');
        } else {
            return redirect('kasir/create')->with('message', 'kasir sudah terdaftar, silahkan masukan kasir lain');
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
        $var = Kasir::find($id);
        if(!$var){
            abort(404);
        }

        return view('kasir.edit')->with('var', $var);
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
        $var = Kasir::find($id);
        $var->nama = $request->nama;
        $var->alamat = $request->alamat;
        $var->telepon = $request->telepon;
        $var->status = $request->status;
        $var->save();
        return redirect('kasir')->with('message', 'Data Berhasil di Edit');
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
        $var = Kasir::find($id);
        $var ->delete();
        return redirect('kasir');
    }
}
