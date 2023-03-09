<?php

namespace App\Http\Controllers;

use App\Trash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $trashes = DB::table('trashes')->orderBy('created_at', 'desc')
        ->paginate(3);

        return view('admin.trash.index', ['trashes' => $trashes]);
    }


    public function search(Request $request){
        $keyword = $request->get('keyword');
        
        $trashes = DB::table('trashes')
        ->where('nama_sampah', 'LIKE', "%".$keyword."%")
        ->paginate();

        return view('admin.trash.index', ['trashes' => $trashes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trash.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sampah' => ['required','string', 'unique:trashes,nama_sampah'],
            'jumlah' => ['required'],
            'harga_sampah' => ['required'],
        ]);

        Trash::create([
            'nama_sampah' => $request['nama_sampah'],
            'jumlah' => $request['jumlah'],
            'harga_sampah' => $request['harga_sampah'],
        ]);
        
        Alert::success('Berhasil', 'Menambahkan Data');
        return redirect('/trash');
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
        $trash = Trash::find($id);
        return view('admin.trash.edit', compact('trash'));
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
        $request->validate([
            'nama_sampah' => ['required','string'],
            'harga_sampah' => ['required'],
        ]);

        Trash::where('id', $id)->update([
            'nama_sampah' => $request['nama_sampah'],
            'harga_sampah' => $request['harga_sampah'],
        ]);
        
        Alert::success('Berhasil', 'Mengubah Data');
        return redirect('/trash');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trash = Trash::find($id);
        $trash->delete();

        Alert::success('BERHASIL', 'MENGHAPUS');
        return redirect('/trash');
    }
}
