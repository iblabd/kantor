<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('userTabel', [
            'karyawans' => karyawan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // if(auth()->user()->hasRole('admin')){
        //     return view('admin.newUserCreate');
        // }else{
        //     return redirect()->route('dashboard')->with();
        // }
        return view('admin.newUserCreate');
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
        //  dd($request);
        // Validate the inputs


        // MakePasswordDefault
        $parts = explode('@', $request['email']);
        $password = $parts[0];
        // dd($password);

        $user = User::create([
            'name'=>$request['nama'],
            'email'=>$request['email'],
            'password' => Hash::make($password),
        ]);

        Karyawan::create([
            'user_id'=>$user->id,
            'nama'=>$request['nama'],
            'tanggalLahir'=>$request['tanggalLahir'],
            'jenisKelamin'=>$request['jenisKelamin'],
            'riwayatPendidikan'=>$request['riwayatPendidikan'],
            'jabatan'=>$request['jabatan'],
            'telephone'=>$request['telephone'],
            'email'=>$request['email'],
            'kota'=>$request['kota'],
            'alamat'=>$request['alamat'],
            'kelurahan'=>$request['kelurahan'],
            'kecamatan'=>$request['kecamatan'],
            'pos'=>$request['pos'],
            'rt'=>$request['rt'],
            'rw'=>$request['rw']
        ]);

        // statment if user set admin
        if($request['adminRole'])
        {
            $user->assignRole(1);
        }
        // end of admin user

        // // ensure the request has a file before we attempt anything else.
        // if ($request->hasFile('file')) {

        //     $request->validate([
        //         'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
        //     ]);

        //     // Save the file locally in the storage/public/ folder under a new folder named /product
        //     $request->file->store('userProfile', 'public');

        //     // Store the record, using the new file hashname which will be it's new filename identity.
        //     $karyawan = new Karyawan([
        //         "nama" => $request->get('nama'),
        //         "file_path" => $request->file->hashName()
        //     ]);
        //     $karyawan->save(); // Finally, save the record.
        // }
        return redirect()->route('admin.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
        // dd($karyawan);
        return view('userInfo', [
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        //
    }
}