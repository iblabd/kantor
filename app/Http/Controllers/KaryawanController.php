<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $karyawan = Karyawan::when($request->has("search"),function($q)use($request){
            return $q->where('nama', 'like', '%'. $request->get('search') . '%');
        })->paginate(12);

        return view('karyawan.userTabel',[
            'karyawans' => $karyawan
        ]);

        // $karyawan = Karyawan::latest()->paginate(12);
        // if(request('search'))
        // {
        //     $karyawan -> where('nama', 'like', '%'. request('search'). '%');
        // }
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
        return view('karyawan.newUserCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Database\QueryException $ex;
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


        $request->validate([
            'file_upload' => 'nullable',
            'file_upload.*' => 'image|mimes:jpeg,png,jpg'
        ]);

        if($request->hasFile('file_upload')){
            $file = $request['file_upload'];
            $extension = $file->getClientOriginalExtension();
            $fileName = 'profile_'.time().'.'.$extension;
            $file->storeAs('public/profile', $fileName);
        }else{
            $fileName = 'default.png';
        }


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
            'rw'=>$request['rw'],
            'provinsi'=>$request['provinsi'],
            'file_path'=>$fileName
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
        return view('karyawan.userInfo', [
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function showProfile(Karyawan $karyawan)
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
