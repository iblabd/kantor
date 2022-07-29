    @extends('layouts.app')
    @include('partials.backNavbar')

    <div class="bg-white">

        <div class="container">
            <x-auth-validation-errors :errors="$errors" />
            <div class="rounded px-4 pt-4">
                <nav class="mt-4" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pegawai') }}">Pegawai</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Pegawai</li>
                    </ol>
                </nav>
                <div class="my-4">
                    <h2>Tambah Pegawai</h2>
                </div>

                <form class="row g-3 col-lg-12 mt-4 needs-validation" action="{{ route('admin.create.execute') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <!-- nama lengkap -->
                    <div class="form-group col-md-9">
                        <label for="username" class="form-label">Nama Lengkap<sup class="text-danger">*wajib</sup></label>
                        <input class="form-control" id="username" type="username" placeholder="Masukkan nama lengkap"
                            name="nama" data-error="#username-error" value="{{ @$karyawan -> nama }}" required>
                        <span class="my-0 text-danger" id="username-error" for="username"></span>
                    </div>
                    <!-- end of nama lengkap -->

                    <!-- jenis kelamin -->
                    <div class="form-group col-md-3">
                        <label for="jenisKelamin" class="form-label">Jenis Kelamin<sup class="text-danger">*wajib</sup></label>
                        <select class="form-select" id="jenisKelamin" name="jenisKelamin" data-error="#jenisKelamin-error" required>
                            <option selected disabled>None</option>
                            <option {{ @$karyawan -> jenisKelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option {{ @$karyawan -> jenisKelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <span class="my-0 text-danger" id="jenisKelamin-error" for="jenisKelamin"></span>
                    </div>
                    <!-- end of jenis kelamin -->

                    <!-- Tanggal Lahir -->
                    <div class="form-group col-md-4">
                        <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                        <input class="form-control" id="tanggalLahir" type="date" placeholder="Tanggal Lahir" name="tanggalLahir"
                            data-error="#tanggalLahir-error" value="{{ @$karyawan -> tanggalLahir }}">
                        <span class="my-0 text-danger" id="tanggalLahir-error" for="tanggalLahir"></span>
                    </div>
                    <!-- end of Tanggal Lahir -->

                    <!-- pendidikan -->
                    <div class="form-group col-md-8">
                        <label for="Pendidikan" class="form-label">Riwayat Pendidikan</label>
                        <select class="form-select" id="Pendidikan" name="riwayatPendidikan" data-error="#Pendidikan-error">
                            <option selected disabled>None</option>
                            <option {{ @$karyawan -> riwayatPendidikan == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                            <option {{ @$karyawan -> riwayatPendidikan == 'D1, D2, D3' ? 'selected' : '' }}>D1, D2, D3</option>
                            <option {{ @$karyawan -> riwayatPendidikan == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                            <option {{ @$karyawan -> riwayatPendidikan == 'Lainnya...' ? 'selected' : '' }}>Lainnya...</option>
                        </select>
                        <span class="my-0 text-danger" id="Pendidikan-error" for="Pendidikan"></span>
                    </div>
                    <!-- end of pendidikan -->

                    <!-- jabatan -->
                    <div class="form-group col-md-12">
                        <label for="jabatan" class="form-label">Jabatan Sebagai</label>
                        <input class="form-control" list="datalistOptions" id="jabatan" placeholder="Menjabat sebagai..."
                            name="jabatan" value="{{ @$karyawan -> jabatan }}">
                            <datalist id="datalistOptions">
                                <option value="Pimpinan">
                                <option value="Wakil Pimpinan">
                                <option value="Pegawai">
                            </datalist>
                        </select>
                        <span class="my-0 text-danger" id="jabatan-error" for="Pendidikan"></span>
                    </div>
                    <!-- end of jabatan -->

                    <!-- nomor handphone -->
                    <div class="form-group col-md-4">
                        <label for="nomorTelephone" class="form-label">Nomor Handphone<sup class="text-danger">*wajib</sup></label>
                        <div class="input-group">
                            <span class="input-group-text" id="nomorTelephone">+62</span>
                            <input type="text" class="form-control" id="nomorTelephone" aria-describedby="inputGroupPrepend2"
                                placeholder="895XXXXXXX" name="telephone" data-error="#nomorTelephone-error" value="{{ @$karyawan -> telephone }}" required>
                        </div>
                        <span class="my-0 text-danger" id="nomorTelephone-error" for="nomorTelephone"></span>
                    </div>
                    <!-- end of nomor handphone -->

                    <!-- email -->
                    <div class="form-group col-md-8">
                        <label for="email" class="form-label">Email<sup class="text-danger">*wajib</sup></label>
                        <input class="form-control" id="email" type="email" placeholder="Enter email address" name="email"
                            data-error="#email-error" value="{{ @$karyawan -> email }}" {{ @$karyawan -> email ? 'disabled' : 'required' }}>
                        <span class="my-0 text-danger" id="email-error" for="email"></span>
                    </div>
                    <!-- end of email -->

                    <!-- alamat   -->
                    <div class="form-group col-12">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input class="form-control" id="alamat" type="text" placeholder="Masukkan alamat" name="alamat"
                            data-error="#alamat-error" value="{{ @$karyawan -> alamat }}">
                        <span class="my-0 text-danger" id="alamat-error" for="alamat"></span>
                    </div>
                    <div class="form-group col-6">
                        <label for="kelurahan" class="form-label">Kelurahan/Desa</label>
                        <input class="form-control" id="kelurahan" type="text" placeholder="Kelurahan" name="kelurahan"
                            data-error="#kelurahan-error" value="{{ @$karyawan -> kelurahan }}">
                        <span class="my-0 text-danger" id="kelurahan-error" for="kelurahan"></span>
                    </div>
                    <div class="form-group col-6">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <input class="form-control" id="kecamatan" type="text" placeholder="Kecamatan" name="kecamatan"
                            data-error="#kecamatan-error" value="{{ @$karyawan -> kecamatan }}">
                        <span class="my-0 text-danger" id="kecamatan-error" for="kecamatan"></span>
                    </div>
                    <div class="form-group col-6">
                        <label for="kota" class="form-label">Kota<sup class="text-danger">*wajib</sup></label>
                        <input class="form-control" id="kota" type="text" placeholder="Kota" name="kota"
                            data-error="#kota-error" value="{{ @$karyawan -> kota }}" required>
                        <span class="my-0 text-danger" id="kota-error" for="kota"></span>
                    </div>
                    <div class="form-group col-6">
                        <label for="provinsi" class="form-label">Provinsi<sup class="text-danger">*wajib</sup></label>
                        <input class="form-control" id="provinsi" type="text" placeholder="Provinsi" name="provinsi"
                            data-error="#provinsi-error" value="{{ @$karyawan -> provinsi }}" required>
                        <span class="my-0 text-danger" id="provinsi-error" for="provinsi"></span>
                    </div>
                    <div class="form-group col-3">
                        <label for="rt" class="form-label">RT</label>
                        <input class="form-control" id="rt" type="text" placeholder="001" name="rt"
                            data-error="#rt-error" value="{{ @$karyawan -> rt }}">
                        <span class="my-0 text-danger" id="rt-error" for="rt"></span>
                    </div>
                    <div class="form-group col-3">
                        <label for="rw" class="form-label">RW</label>
                        <input class="form-control" id="rw" type="text" placeholder="001" name="rw"
                            data-error="#rw-error" value="{{ @$karyawan -> rw }}">
                        <span class="my-0 text-danger" id="rw-error" for="rw"></span>
                    </div>
                    <div class="form-group col-6">
                        <label for="kodePos" class="form-label">Kode Pos</label>
                        <input class="form-control" id="kodePos" type="text" placeholder="Kode Pos" name="pos"
                            data-error="#kodePos-error" value="{{ @$karyawan -> pos }}">
                        <span class="my-0 text-danger" id="kodePos-error" for="kodePos"></span>
                    </div>
                    <!-- end of alamat -->

                    <!-- file -->
                    <div class="col-12">
                        <label for="file" class="form-label">Upload Foto Profile</label>
                        <input class="form-control" type="file" name="file_upload">
                        <div id="file" class="form-text">dapat menggunakan format [".jpg",".png"]</div>
                    </div>
                    <!-- end of file -->

                    {{-- <!-- findme -->
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

                    <!-- end of findme --> --}}

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
        </div>
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
    @include('partials.validation')
