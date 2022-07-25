@extends('kehadiran.layouts.layout-forAbsen')

@include('partials.backNavbar')
@section('header')
  <div class="mt-5">
    <div class="row align-items-start">
      <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-auto text-center">
                        <div class="icon icon-shape bg-success text-white rounded-circle shadow p-1">
                            <i class="fa-solid fa-circle-check fa-5x"></i>
                        </div>
                    </div>
                    <div class="col-8">
                        <h5 class="card-title text-uppercase text-muted mb-0 mt-3">Masuk</h5>
                        <span class="h5 font-weight-bold mb-0">{{ @$masuk }}</span>
                    </div>
                  </div>
            </div>
          </div>
      </div>
      <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-auto text-center">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow p-1">
                            <i class="fa-solid fa-circle-exclamation fa-5x"></i>
                        </div>
                    </div>
                    <div class="col-8">
                        <h5 class="card-title text-uppercase text-muted mb-0 mt-3">Telat</h5>
                        <span class="h5 font-weight-bold mb-0">{{ @$telat }}</span>
                    </div>
                  </div>
            </div>
          </div>
      </div>
      <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-auto text-center">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow p-1">
                            <i class="fa-solid fa-circle-info fa-5x"></i>
                        </div>
                    </div>
                    <div class="col-8">
                        <h5 class="card-title text-uppercase text-muted mb-0 mt-3">Cuti</h5>
                        <span class="h5 font-weight-bold mb-0">{{ $cuti }}</span>
                    </div>
                  </div>
            </div>
          </div>
      </div>
      <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-auto text-center">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow p-1">
                            <i class="fa-solid fa-circle-xmark fa-5x"></i>
                        </div>
                    </div>
                    <div class="col-8">
                        <h5 class="card-title text-uppercase text-muted mb-0 mt-3">Alpha</h5>
                        <span class="h5 font-weight-bold mb-0">{{ $alpha }}</span>
                    </div>
                  </div>
            </div>
          </div>
      </div>

    </div>
  </div>
@endsection

@section('body')
    <div class="card shadow">
        <div class="card-header">
            <h5 class="mb-1 pt-1 font-weight-bold float-left">Rekap Kehadiran</h5>
            <form class="float-right" action="{{ route('kehadiran.excel-users') }}" method="get">
                <input type="hidden" name="tanggal" value="{{ request('tanggal', date('Y-m-d')) }}">
                <button class="btn btn-sm btn-primary mt-2" type="submit" title="Download"><i class="fas fa-download"></i> Download</button>
            </form>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <form action="{{ route('kehadiran.search') }}" method="get">
                        <div class="form-group row">
                            <label for="tanggal" class="col-form-label col-sm-3">Tanggal</label>
                            <div class="input-group col-sm-9">
                                <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ request('tanggal', date('Y-m-d')) }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="float-right">
                        {{ $presents->links() }}
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Total Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$presents->count())
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data yang tersedia</td>
                            </tr>
                        @else
                            @foreach ($presents as $present)
                                <tr>
                                    <th>{{ $rank++ }}</th>
                                    <td>{{ $present->user->name }}</td>
                                    <td>{{ $present->keterangan }}</td>
                                    @if ($present->jam_masuk)
                                        <td>{{ date('H:i:s', strtotime($present->jam_masuk)) }}</td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    @if($present->jam_keluar)
                                        <td>{{ date('H:i:s', strtotime($present->jam_keluar)) }}</td>
                                        <td>
                                            @if (strtotime($present->jam_keluar) <= strtotime($present->jam_masuk))
                                                {{ 21 - (\Carbon\Carbon::parse($present->jam_masuk)->diffInHours(\Carbon\Carbon::parse($present->jam_keluar))) }}
                                            @else
                                                @if (strtotime($present->jam_keluar) >= strtotime('19:00:00'))
                                                    {{ (\Carbon\Carbon::parse($present->jam_masuk)->diffInHours(\Carbon\Carbon::parse($present->jam_keluar))) - 3 }}
                                                @else
                                                    {{ (\Carbon\Carbon::parse($present->jam_masuk)->diffInHours(\Carbon\Carbon::parse($present->jam_keluar))) - 1 }}
                                                @endif
                                            @endif
                                        </td>
                                    @else
                                        <td>-</td>
                                        <td>-</td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
