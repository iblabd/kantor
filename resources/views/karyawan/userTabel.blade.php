@extends('layouts.dashboard')

@section('content')
    <div class="bg-white border rounded px-4 pt-4" style="{{ $karyawans->count() < 3 ? 'height: 46vh' : '' }}">
        <nav class="mt-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pegawai</li>
            </ol>
        </nav>
        <div class="my-4">
            <h2>List Data Pegawai</h2>
            <h5 id="helpId">PT BABU PELAJAR</h5>
        </div>
        @if ($karyawans->count() >= 1)
            <div class="container">
                <div class="row mb-1">
                    @if ($karyawans->count() > 12)
                    <class class="col-md-4">
                        <form class="d-flex" role="search">
                            <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </form>
                    </class>
                    @endif
                    @role('admin')
                        @if ($karyawans->count() > 12)
                            <div class="col-md-4 offset-md-4 text-right">
                        @else
                            <div class="col-md-4">
                        @endif
                            <a class="btn btn-outline-primary" href="{{ route('admin.create') }}"> <i class="fa-solid fa-user-group"></i> Tambah Pegawai</a>
                        </div>
                    @endrole
                </div>
            </div>
            <div class="col-lg-12">
                <table class="table table-responsive border d-block table-bordered table-hover">
                    <thead class="table-secondary text-center">
                        <tr>
                            <th>Nama</th>
                            <th>Kelamin</th>
                            <th>Status</th>
                            <th>No. HP</th>
                            <th>Alamat</th>
                            <th>Pendidikan</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                        @foreach ($karyawans as $karyawan)
                        {{-- @php($present = \App\Models\Present::whereUserId($karyawan->user_id)->whereTanggal(date('Y-m-d'))->first()); --}}
                            <tr valign="middle" data-bs-toggle="modal" data-bs-target="#customModal-{{ $karyawan->user_id }}">
                                <td style="min-width: 240px;" class="text-nowrap text-center">{{ $karyawan->nama }}</td>
                                <td class="text-nowrap text-center">{{ $karyawan->jenisKelamin }}</td>
                                <td class="text-nowrap text-center">{{ $karyawan->jabatan }}</td>
                                <td class="text-nowrap">(+62) {{ $karyawan->telephone }}</td>
                                <td style="min-width: 240px;">{{ $karyawan->alamat }},
                                    RT{{ $karyawan->rt }}/RW{{ $karyawan->rw }}, {{ $karyawan->kelurahan }},
                                    {{ $karyawan->kecamatan }}, {{ $karyawan->kota }}, ID {{ $karyawan->pos }}</td>
                                <td class="text-nowrap text-center">{{ $karyawan->riwayatPendidikan }}</td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="customModal-{{ $karyawan->user_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ $karyawan->nama }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- <p class="mb-3">
                                                Keterangan: Mengerjakan tugas PKL tambahan.<br>
                                                Jam Masuk:  @if ($present->jam_masuk)
                                                                <td>{{ date('H:i:s', strtotime($present->jam_masuk)) }}</td>
                                                            @else
                                                                <td>-</td>
                                                            @endif<br>
                                                jam Keluar: 21.00
                                            </p> --}}
                                            <small>
                                                <p style="margin-bottom: -5px;">Status Pegawai <b>|</b></p>
                                                <b>20 Juni 2022</b>
                                            </small>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ route('detailPegawai', [$karyawan->user_id]) }}"
                                                class="btn btn-primary">More Information</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                {{ $karyawans->links() }}
            </div>
        @else
            <div class="alert alert-warning">Tidak ada data karyawan</div>
        @endif
    </div>
@endsection
