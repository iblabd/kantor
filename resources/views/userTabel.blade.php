@extends('layouts.dashboard')



@if ($karyawans->count() >= 1)
@section('content')
<div class="bg-white border rounded px-4 py-4">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' width='16' height='16' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pegawai</li>
        </ol>
    </nav>
    <div class="my-4">
        <h2>List Data Pegawai</h2>
        <h5 id="helpId">PT BABU PELAJAR</h5>
    </div>

    <div class="col-lg-12 mt-4">
        <table class="table table-responsive border d-block table-bordered table-hover">
            <thead class="table-secondary text-center">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kelamin</th>
                    <th>Status</th>
                    <th>No. HP</th>
                    <th>Aktivitas</th>
                    <th>Alamat</th>
                    <th>Pendidikan</th>
                </tr>
            </thead>
            <tbody class="table-light">
                @foreach ($karyawans as $karyawan)
                    <tr valign="middle" data-bs-toggle="modal"  data-bs-target="#customModal-{{ $karyawan->id }}">
                        <td class="text-nowrap text-center">{{ $karyawan->id }}</td>
                        <td style="min-width: 240px;" class="text-nowrap">{{ $karyawan->nama }}</td>
                        <td class="text-nowrap text-center">{{ $karyawan->jenisKelamin }}</td>
                        <td class="text-nowrap text-center">{{ $karyawan->jabatan }}</td>
                        <td class="text-nowrap">(+62) {{ $karyawan->telephone }}</td>
                        <td class="text-nowrap text-center">Lembur</td>
                        <td style="min-width: 240px;">{{ $karyawan->alamat }},
                            RT{{ $karyawan->rt }}/RW{{ $karyawan->rw }}, {{ $karyawan->kelurahan }},
                            {{ $karyawan->kecamatan }}, {{ $karyawan->kota }}, ID {{ $karyawan->pos }}</td>
                        <td class="text-nowrap text-center">{{ $karyawan->riwayatPendidikan }}</td>
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
</div>
@endsection
@else
    @section('content')
        Tidak ada data karyawan
    @endsection
@endif
