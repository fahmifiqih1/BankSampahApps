<?php

namespace App\Http\Controllers;

use App\Collector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CollectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collectors = DB::table('collectors')->orderBy('created_at', 'desc')
        ->paginate(3);
        return view('admin.collector.index', ['collectors' => $collectors]);
    }

    public function search(Request $request){
        $keyword = $request->get('keyword');
        
        $collectors = DB::table('collectors')
        ->where('nama_pengepul', 'LIKE', "%".$keyword."%")
        ->paginate();

        return view('admin.collector.index', ['collectors' => $collectors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.collector.create');
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
            'no_rek' => ['required', 'unique:collectors,no_rek'],
            'nama_pengepul' => ['required'],
            'nama_perusahaan' => ['required'],
            'alamat' => ['required'],
            'telp' => ['required'],
        ]);

        Collector::create([
            'no_rek' => $request['no_rek'],
            'nama_pengepul' => $request['nama_pengepul'],
            'nama_perusahaan' => $request['nama_perusahaan'],
            'alamat' => $request['alamat'],
            'telp' => $request['telp'],
        ]);
        
        Alert::success('Berhasil', 'Menambahkan Data');
        return redirect('/collectors');
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
        $collector = Collector::find($id);
        return view('admin.collector.edit', compact('collector'));
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
            'no_rek' => ['required'],
            'nama_pengepul' => ['required'],
            'nama_perusahaan' => ['required'],
            'alamat' => ['required'],
            'telp' => ['required'],
        ]);

         $collector = Collector::where('id', $id)->update([
            'no_rek' => $request['no_rek'],
            'nama_pengepul' => $request['nama_pengepul'],
            'nama_perusahaan' => $request['nama_perusahaan'],
            'alamat' => $request['alamat'],
            'telp' => $request['telp'],
        ]);

        Alert::success('Berhasil', 'Mengubah Data');
        return redirect('/collectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collector = Collector::find($id);
        $collector->delete();

        Alert::success('BERHASIL', 'MENGHAPUS');
        return redirect('/collectors');
    }
}
