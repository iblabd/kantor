@extends('layouts.dashboard')


@section('content')
<x-auth-validation-errors :errors="$errors" />
    <div class="bg-white border rounded px-4 pt-4">
        <nav class="mt-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Pegawai</li>
            </ol>
        </nav>
        <div class="my-4">
            <h2>Tambah Pegawai</h2>
        </div>

        <form class="row g-3 col-lg-12 mt-4" action="{{ route('admin.create.execute') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <!-- nama lengkap -->
            <div class="col-md-9">
                <label for="username" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="username" name="nama">
            </div>
            <!-- end of nama lengkap -->

            <!-- jenis kelamin -->
            <div class="col-md-3">
                <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                <select id="jenisKelamin" class="form-select" name="jenisKelamin">
                    <option selected disabled>None</option>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>
            <!-- end of jenis kelamin -->

            <!-- Tanggal Lahir -->
            <div class="col-md-4">
                <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir">
            </div>
            <!-- end of Tanggal Lahir -->

            <!-- pendidikan -->
            <div class="col-md-8">
                <label for="Pendidikan" class="form-label">Riwayat Pendidikan</label>
                <select id="Pendidikan" class="form-select" name="riwayatPendidikan">
                    <option selected disabled>None</option>
                    <option>Sarjana</option>
                    <option>D1, D2, D3</option>
                    <option>SMA/SMK</option>
                    <option>Lainnya...</option>
                </select>
            </div>
            <!-- end of pendidikan -->

            <!-- jabatan -->
            <div class="col-md-12">
                <label for="jabatan" class="form-label">Jabatan Sebagai</label>
                <input class="form-control" list="datalistOptions" id="jabatan" placeholder="Menjabat sebagai..."
                    name="jabatan">
                <datalist id="datalistOptions">
                    <option value="Pimpinan">
                    <option value="Wakil Pimpinan">
                    <option value="Pegawai">
                </datalist>
            </div>
            <!-- end of jabatan -->

            <!-- nomor handphone -->
            <div class="col-md-4">
                <label for="nomorTelephone" class="form-label">Nomor Handphone</label>
                <div class="input-group">
                    <span class="input-group-text" id="nomorTelephone">+62</span>
                    <input type="text" class="form-control" id="nomorTelephone" aria-describedby="inputGroupPrepend2"
                        name="telephone">
                </div>
                <div id="emailHelp" class="form-text">contoh pengisian 896*******</div>
            </div>
            <!-- end of nomor handphone -->

            <!-- email -->
            <div class="col-md-8">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <!-- end of email -->

            <!-- alamat   -->
            <div class="col-12">
                <label for="kota" class="form-label">Kota</label>
                <input type="text" class="form-control" id="kota" name="kota">
            </div>
            <div class="col-6">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="col-6">
                <label for="kelurahan" class="form-label">Kelurahan/Desa</label>
                <input type="text" class="form-control" id="kelurahan" name="kelurahan">
            </div>
            <div class="col-md-8">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan" name="kecamatan">
            </div>
            <div class="col-md-1">
                <label for="rt" class="form-label">RT</label>
                <input type="text" class="form-control" id="rt" name="rt">
            </div>
            <div class="col-md-1">
                <label for="rw" class="form-label">RW</label>
                <input type="text" class="form-control" id="rw" name="rw">
            </div>
            <div class="col-md-2">
                <label for="kodePos" class="form-label">Kode Pos</label>
                <input type="text" class="form-control" id="kodePos" name="pos">
            </div>
            <!-- end of alamat -->

            <!-- file -->
            <div class="col-12">
                <label for="file" class="form-label">Upload Foto Profile</label>
                <input class="form-control" type="file" name="file_upload">
                <div id="file" class="form-text">dapat menggunakan format [".jpg",".png"]</div>
            </div>
            <!-- end of file -->

            <!-- findme -->
            <label for="inputEmail4" class="form-label" style="margin-bottom: -0.3rem;">Social Media</label>
            <!-- linkedin -->
            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fa-brands fa-linkedin"></i>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" id="linkedin"
                        disabled>
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" type="checkbox" value="" id="yourBox"
                            onmousedown="this.form.linkedin.disabled=this.checked"
                            aria-label="Checkbox for following text input">
                    </div>
                </div>
            </div>

            <!-- github -->
            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fa-brands fa-github"></i>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" id="github"
                        disabled>
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" type="checkbox" value="" id="yourBox"
                            onmousedown="this.form.github.disabled=this.checked"
                            aria-label="Checkbox for following text input">
                    </div>
                </div>
            </div>

            <!-- twitter -->
            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fa-brands fa-twitter"></i>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" id="twitter"
                        disabled>
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" type="checkbox" value="" id="yourBox"
                            onmousedown="this.form.twitter.disabled=this.checked"
                            aria-label="Checkbox for following text input">
                    </div>
                </div>
            </div>

            <!-- instagram -->
            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" id="instagram"
                        disabled>
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" type="checkbox" value="" id="yourBox"
                            onmousedown="this.form.instagram.disabled=this.checked"
                            aria-label="Checkbox for following text input">
                    </div>
                </div>
            </div>

            <!-- facebook -->
            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fa-brands fa-facebook"></i>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" id="facebook"
                        disabled>
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" type="checkbox" value="" id="yourBox"
                            onmousedown="this.form.facebook.disabled=this.checked"
                            aria-label="Checkbox for following text input">
                    </div>
                </div>
            </div>

            <!-- telegram -->
            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fa-brands fa-telegram"></i>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" id="telegram"
                        disabled>
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" type="checkbox" value="" id="yourBox"
                            onmousedown="this.form.telegram.disabled=this.checked"
                            aria-label="Checkbox for following text input">
                    </div>
                </div>
            </div>
            <div id="emailHelp" class="form-text">checkbox jika meiliki akun social tersebut</div>

            <!-- end of findme -->

            <div class="col-12">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="true" name="adminRole" role="switch"
                        id="flexSwitchCheckDefault" tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus"
                        title="Penting!" data-bs-placement="left"
                        data-bs-content="Mengaktifkan ini artinya anda setuju menjadikan user sebagai admin?">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Atur user sebagai admin</label>
                </div>
            </div>
            <div class="col-12 mb-5">
                <button type="submit" class="btn btn-primary">Simpan data</button>
            </div>
        </form>
    </div>
    <!-- <div class="col-12">
                <label for="jenisKelamin2" class="form-label">Jenis Kelamin</label>
                <div class="none">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Pria">
                    <label class="form-check-label" for="inlineRadio1">Pria</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Wanita">
                    <label class="form-check-label" for="inlineRadio2">Wanita</label>
                  </div>
                </div>
              </div> -->
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
        const popover = new bootstrap.Popover('.popover-dismiss', {
            trigger: 'focus'
        })
    </script>
@endsection
