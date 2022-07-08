<?php

namespace App\Http\Controllers;

use App\Models\Present;
use App\Models\User;
use Illuminate\Http\Request;

class PresentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $presents = Present::whereTanggal(date('Y-m-d'))->orderBy('jam_masuk')->paginate(6);
        $masuk = Present::whereTanggal(date('Y-m-d'))->whereKeterangan('masuk')->count();
        $telat = Present::whereTanggal(date('Y-m-d'))->whereKeterangan('telat')->count();
        $cuti = Present::whereTanggal(date('Y-m-d'))->whereKeterangan('cuti')->count();
        $alpha = Present::whereTanggal(date('Y-m-d'))->whereKeterangan('alpha')->count();
        $rank = $presents->firstItem();
        return view('kehadiran', compact('presents','rank','masuk','telat','cuti','alpha'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexForAbsen()
    {
        //
        $present = Present::whereUserId(auth()->user()->id)->whereTanggal(date('Y-m-d'))->first();
        $url = 'https://kalenderindonesia.com/api/YZ35u6a7sFWN/libur/masehi/'.date('Y/m');
        $kalender = file_get_contents($url);
        $kalender = json_decode($kalender, true);
        $libur = false;
        $holiday = null;
        if ($kalender['data'] != false) {
            if ($kalender['data']['holiday']['data']) {
                foreach ($kalender['data']['holiday']['data'] as $key => $value) {
                    if ($value['date'] == date('Y-m-d')) {
                        $holiday = $value['name'];
                        $libur = true;
                        break;
                    }
                }
            }
        }
        return view('kehadiran.absen', compact('present','libur','holiday'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $present = Present::whereUserId($request->user_id)->whereTanggal(date('Y-m-d'))->first();
    //     if ($present) {
    //         return redirect()->back()->with('error','Absensi hari ini telah terisi');
    //     }
    //     $data = $request->validate([
    //         'keterangan'    => ['required'],
    //         'user_id'    => ['required']
    //     ]);
    //     $data['tanggal'] = date('Y-m-d');
    //     if ($request->keterangan == 'Masuk' || $request->keterangan == 'Telat') {
    //         $data['jam_masuk'] = $request->jam_masuk;
    //         if (strtotime($data['jam_masuk']) >= strtotime('07:00:00') && strtotime($data['jam_masuk']) <= strtotime('08:00:00')) {
    //             $data['keterangan'] = 'Masuk';
    //         } else if (strtotime($data['jam_masuk']) > strtotime('08:00:00') && strtotime($data['jam_masuk']) <= strtotime('17:00:00')) {
    //             $data['keterangan'] = 'Telat';
    //         } else {
    //             $data['keterangan'] = 'Alpha';
    //         }
    //     }
    //     Present::create($data);
    //     return redirect()->back()->with('success','Kehadiran berhasil ditambahkan');
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Present  $present
     * @return \Illuminate\Http\Response
     */
    public function show(Present $present)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Present  $present
     * @return \Illuminate\Http\Response
     */
    public function edit(Present $present)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Present  $present
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Present $present)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Present  $present
     * @return \Illuminate\Http\Response
     */
    public function destroy(Present $present)
    {
        //
    }

    public function checkIn(Request $request)
    {
        $users = User::all();
        $alpha = false;

        if (date('l') == 'Saturday' || date('l') == 'Sunday') {
            return redirect()->back()->with('error','Hari Libur Tidak bisa Check In');
        }

        foreach ($users as $user) {
            $absen = Present::whereUserId($user->id)->whereTanggal(date('Y-m-d'))->first();
            if (!$absen) {
                $alpha = true;
            }
        }

        if ($alpha) {
            foreach ($users as $user) {
                if ($user->id != $request->user_id) {
                    Present::create([
                        'keterangan'    => 'Alpha',
                        'tanggal'       => date('Y-m-d'),
                        'user_id'       => $user->id
                    ]);
                }
            }
        }

        $present = Present::whereUserId($request->user_id)->whereTanggal(date('Y-m-d'))->first();
        if ($present) {
            if ($present->keterangan == 'Alpha') {
                $data['jam_masuk']  = date('H:i:s');
                $data['tanggal']    = date('Y-m-d');
                $data['user_id']    = $request->user_id;
                if (strtotime($data['jam_masuk']) >= strtotime('07:00:00') && strtotime($data['jam_masuk']) <= strtotime('08:00:00')) {
                    $data['keterangan'] = 'Masuk';
                } else if (strtotime($data['jam_masuk']) > strtotime('08:00:00') && strtotime($data['jam_masuk']) <= strtotime('17:00:00')) {
                    $data['keterangan'] = 'Telat';
                } else {
                    $data['keterangan'] = 'Alpha';
                }
                $present->update($data);
                return redirect()->back()->with('success','Check-in berhasil');
            } else {
                return redirect()->back()->with('error','Check-in gagal');
            }
        }

        $data['jam_masuk']  = date('H:i:s');
        $data['tanggal']    = date('Y-m-d');
        $data['user_id']    = $request->user_id;
        if (strtotime($data['jam_masuk']) >= strtotime('07:00:00') && strtotime($data['jam_masuk']) <= strtotime('08:00:00')) {
            $data['keterangan'] = 'Masuk';
        } else if (strtotime($data['jam_masuk']) > strtotime('08:00:00') && strtotime($data['jam_masuk']) <= strtotime('17:00:00')) {
            $data['keterangan'] = 'Telat';
        } else {
            $data['keterangan'] = 'Alpha';
        }

        Present::create($data);
        return redirect()->back()->with('success','Check-in berhasil');
    }

    public function checkOut(Request $request, Present $kehadiran)
    {
        $data['jam_keluar'] = date('H:i:s');
        $kehadiran->update($data);
        return redirect()->back()->with('success', 'Check-out berhasil');
    }
}
