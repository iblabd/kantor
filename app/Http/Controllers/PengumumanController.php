<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pengumuman', [
            'pengumumans' => Pengumuman::all()
        ]);
        // // $pengumumans = Pengumuman::latest()->paginate(5);
        // return view('pengumuman',compact('pengumuman'))
        //       ->with('i',(request()->input('page', 1) -1 )* 5);
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
        // dd($request);
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'waktu' => 'required',

        ]);

        Pengumuman::create($request->all());

        return redirect()->route('pengumuman')
              ->with('success','Pengumuman created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $pengumuman)
    {
        // return view('pengumuman');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        $pengumuman = Pengumuman::find($pengumuman);
        return view('edit')->with('pengumuman', $pengumuman);
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

        ]);

        $pengumuman->update($request->all());

        return redirect()->route('pengumuman')
         ->with('success','Pengumuman updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return redirect()->route('pengumuman')
        ->with('success','Pengumuman deleted successfully');
    }

    public function pengumuman(){
        return view('pengumuman');
    }
}
