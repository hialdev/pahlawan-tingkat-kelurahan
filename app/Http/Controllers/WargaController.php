<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wargas = Warga::all();
        return view('index',compact('wargas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'min:10|max:12|required|unique:wargas,nik',
            'nama' => 'required',
            'lahir' => 'required|date',
            'alamat' => 'required',
        ]);

        $warga = Warga::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'lahir' => $request->lahir,
            'alamat' => $request->alamat,
        ]);

        if ($warga) {
            return redirect()
                ->route('warga.index')
                ->with([
                    'success' => 'Hore, Data berhasil ditambahkan!'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Error, Harap masukan data dengan benar'
                ]);
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
        $warga = Warga::findOrFail($id);
        return view('edit', compact('warga'));
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
        $this->validate($request, [
            'nik' => 'min:10|max:12|required|unique:wargas,nik',
            'nama' => 'required',
            'lahir' => 'required|date',
            'alamat' => 'required',
        ]);
        $warga = Warga::findOrFail($id);
        $warga->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'lahir' => $request->lahir,
            'alamat' => $request->alamat,
        ]);

        if ($warga) {
            return redirect()
                ->route('warga.index')
                ->with([
                    'success' => 'Hore, Data Telah Terupdate!'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Error, Harap update data dengan benar'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        if ($warga) {
            return redirect()
                ->route('warga.index')
                ->with([
                    'success' => 'Data berhasil dihapus!'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Error, Harap update data dengan benar'
                ]);
        }

    }
}
