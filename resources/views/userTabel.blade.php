<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="container pt-2 pb-2">
            <a name="" id="" class="btn btn-danger ps-5 pe-5" href="#" role="button">< Back</a>
        </div>
    </nav>

    <!-- title -->
    <div class="container">
        <nav class="mt-4" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Pegawai</li>
            </ol>
        </nav>

        <div>
            <p style="margin-bottom: -2px;">List Data Pegawai |</p>
            <small id="helpId" class="form-text text-muted">PT BABU PELAJAR</small>
        </div>
    </div>

    <!-- main item -->
    <div class="container mt-5">
        <table class="table table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nomor Handphone</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Riwayat Pendidikan</th>
                    <th>Aktifitas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawans as $karyawan)
                <tr>
                    <td>{{ $karyawan -> id }}</td>
                    <td>+62 {{ $karyawan -> telephone }}</td>
                    <td>{{ $karyawan -> nama }}</td>
                    <td>{{ $karyawan -> jabatan }}</td>
                    <td>Indonesia, {{ $karyawan -> kota }}, {{ $karyawan ->  kecamatan }}, RT {{ $karyawan ->  rt }}, RW {{ $karyawan ->  rw }}, {{ $karyawan ->  pos }}</td>
                    <td>{{ $karyawan ->  jenisKelamin }}</td>
                    <td>{{ $karyawan ->  riwayatPendidikan }}</td>
                    <td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#customModal-{{ $karyawan -> id }}">Lembur</button></td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="customModal-{{ $karyawan -> id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $karyawan -> nama }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-3">
                                Keterangan: Mengerjakan tugas PKL tambahan.<br>
                                Jam Masuk: 08.30 <br>
                                jam Keluar: 21.00
                            </p>
                            <small>
                                <p style="margin-bottom: -5px;">Status Pegawai <b>|</b></p>
                                <b>20 Juni 2022</b>
                            </small>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="{{ route('detailPegawai', [$karyawan -> id]) }}" class="btn btn-primary">More Information</a>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <!-- Modal -->
    <div class="modal fade" id="{{ $karyawan -> nama }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $karyawan -> nama }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-3">
                    Keterangan: Mengerjakan tugas PKL tambahan.<br>
                    Jam Masuk: 08.30 <br>
                    jam Keluar: 21.00
                </p>
                <small>
                    <p style="margin-bottom: -5px;">Status Pegawai <b>|</b></p>
                    <b>20 Juni 2022</b>
                </small>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">More Detail</button>
            </div>
        </div>
        </div>
    </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
