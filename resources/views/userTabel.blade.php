@extends('layouts.dashboard')




@section('content')
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pegawai</li>
        </ol>
    </nav>
    <div class="my-4">
        <h2>List Data Pegawai</h2>
        <h5 id="helpId">PT BABU PELAJAR</h5>
    </div>

    <div class="mt-5">
        <table class="table table-responsive">
            <thead class="table-secondary text-center">
                <tr>
                    <th>ID</th>
                    <th>No. HP</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Alamat</th>
                    <th>Kelamin</th>
                    <th>Pendidikan</th>
                    <th>Aktivitas</th>
                </tr>
            </thead>
            <tbody class="table-hover table-light">
                @foreach ($karyawans as $karyawan)
                    <tr>
                        <td class="text-center">{{ $karyawan->id }}</td>
                        <td>+62 {{ $karyawan->telephone }}</td>
                        <td>{{ $karyawan->nama }}</td>
                        <td class="text-center">{{ $karyawan->jabatan }}</td>
                        <td>Indonesia, {{ $karyawan->kota }}, {{ $karyawan->kecamatan }}, RT
                            {{ $karyawan->rt }}, RW {{ $karyawan->rw }}, {{ $karyawan->pos }}</td>
                        <td class="text-center">{{ $karyawan->jenisKelamin }}</td>
                        <td class="text-center">{{ $karyawan->riwayatPendidikan }}</td>
                        <td><button type="button" class="btn" data-bs-toggle="modal"
                                data-bs-target="#customModal-{{ $karyawan->id }}">Lembur</button></td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="customModal-{{ $karyawan->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $karyawan->nama }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
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
                                    <a href="{{ route('detailPegawai', [$karyawan->id]) }}"
                                        class="btn btn-primary">More Information</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
