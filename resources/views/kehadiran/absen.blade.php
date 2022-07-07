<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        .card {
            margin: 0 auto;
            /* Added */
            float: none;
            /* Added */
            margin-bottom: 10px;
            /* Added */
            margin-top: 40vh;
        } body{
            height: 60vh;
        }
    </style>
  </head>
  <body>
    {{-- cardmain --}}
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            @if ($libur)
                <div class="text-center">
                    <p>Absen Libur (Hari Libur Nasional {{ $holiday }})</p>
                </div>
                @else
                @if (date('l') == "Saturday" || date('l') == "Sunday")
                    <div class="text-center">
                        <p>Absen Libur</p>
                    </div>
                @else
                    @if ($present)
                        @if ($present->keterangan == 'Alpha')
                            <div class="text-center">
                                @if (strtotime(date('H:i:s')) >= strtotime('07:00:00') && strtotime(date('H:i:s')) <= strtotime('17:00:00'))
                                    <p>Silahkan Check-in</p>
                                    <form action="{{ route('kehadiran.check-in') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <button class="btn btn-primary" type="submit">Check-in</button>
                                    </form>
                                @else
                                    <p>Check-in Belum Tersedia</p>
                                @endif
                            </div>
                        @elseif($present->keterangan == 'Cuti')
                            <div class="text-center">
                                <p>Anda Sedang Cuti</p>
                            </div>
                        @else
                            <div class="text-center">
                                <p>
                                    Check-in hari ini pukul : ({{ ($present->jam_masuk) }})
                                </p>
                                @if ($present->jam_keluar)
                                    <p>Check-out hari ini pukul : ({{ $present->jam_keluar }})</p>
                                @else
                                    @if ((\Carbon\Carbon::parse($present->jam_masuk)->diffInHours(\Carbon\Carbon::parse(date('H:i:s')))) >= 2)
                                        <p>Jika pekerjaan telah selesai silahkan check-out</p>
                                        <form action="{{ route('kehadiran.check-out', ['kehadiran' => $present]) }}" method="post">
                                            @csrf @method('patch')
                                            <button class="btn btn-primary" type="submit">Check-out</button>
                                        </form>
                                    @else
                                        <p>Check-out Belum Tersedia</p>
                                    @endif
                                @endif
                            </div>
                        @endif
                    @else
                        <div class="text-center">
                            @if (strtotime(date('H:i:s')) >= strtotime('07:00:00') && strtotime(date('H:i:s')) <= strtotime('17:00:00'))
                                <p>Silahkan Check-in</p>
                                <form action="{{ route('kehadiran.check-in') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <button class="btn btn-primary" type="submit">Check-in</button>
                                </form>
                            @else
                                <p>Check-in Belum Tersedia</p>
                            @endif
                        </div>
                    @endif
                @endif
            @endif
        </div>
      </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>
