<link rel="stylesheet" href="{{ asset('style/store.css') }}">
<link rel="stylesheet" href="{{ asset('style/user.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

<x-layout>
    <div class="container">
        <div class="pembatas"></div>
        <h1 style="text-align: center;">Formulir Permohonan Pengajuan Hukum</h1>

        <div class="row m-4">
            <div class="col-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nomor Pemohon</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nomor Pemohon">
                </div>
            </div>
        </div>

        
        <div class="row me-4 ms-4">
            <h2>Data Pribadi</h2>
            <div class="col-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap">
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Panggilan</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nama Panggilan">
                </div>
            </div>
        </div>

        <div class="row me-4 ms-4">
            <div class="col-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tempat Lahir</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Tempat Lahir">
                </div>
            </div>
        </div>

        <div class="row me-4 ms-4">
            <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
            <div class="col-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="option1">
                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                </div>
            </div>
            <div class="col-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2">
                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                </div>
            </div>
        </div>

        <div class="row me-4 ms-4 mt-3">
            <label for="exampleFormControlInput1" class="form-label">Agama</label>
            <div class="col-5">
                <select class="form-select" aria-label="Default select example">
                    <option selected="">Agama</option>
                    <option value="1">Islam</option>
                    <option value="2">Kristen</option>
                    <option value="3">Katolik</option>
                    <option value="4">Buddha</option>
                    <option value="5">Hindu</option>
                    <option value="6">Konghucu</option>
                </select>
            </div>
        </div>

        <div class="row me-4 ms-4 mt-3">
            <label for="exampleFormControlInput1" class="form-label">Status Perkawinan</label>
            <div class="col-5">
                <select class="form-select" aria-label="Default select example">
                    <option selected="">Status Perkawinan</option>
                    <option value="1">Sudah</option>
                    <option value="2">Belum</option>
                    <option value="3">Duda</option>
                    <option value="4">Janda</option>
                    <option value="5">Cerai</option>
                </select>
            </div>
        </div>

        <div class="row me-4 ms-4 mt-3">
            <div class="col-4">
                <label for="jumlahAnak">Jumlah Anak</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="jumlahAnak" name="jumlahAnak" min="0">
                    <div class="input-group-append">
                        <span class="input-group-text">orang</span>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
            <div class="col-4">
                <label for="jumlahAnak">Jumlah Anak dalam Tanggungan</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="jumlahAnak" name="jumlahAnak" min="0">
                    <div class="input-group-append">
                        <span class="input-group-text">orang</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row me-4 ms-4 mt-3">
            <div class="my-3">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat Lengkap</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>

        <div class="row me-4 ms-4 mt-3">
            <div class="col-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">RT/RW</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="RT/RW">
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kode Pos</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Kode Pos">
                </div>
            </div>
        </div>

        <div class="row me-4 ms-4 mt-3">
            <div class="col-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Desa/Kelurahan</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Desa/Kelurahan">
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kecamatan</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Kecamatan">
                </div>
            </div>
        </div>

        <div class="row me-4 ms-4 mt-3">
            <div class="col-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kabupaten/Kota</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Kabupaten/Kota">
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Provinsi</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Provinsi">
                </div>
            </div>
        </div>

        
        <div class="row me-4 ms-4 mt-3">
            <div class="h2">Data Tambahan</div>
            <label for="exampleFormControlInput1" class="form-label">Identitas Diri</label>
            <div class="col-5">
                <select class="form-select" aria-label="Default select example">
                    <option selected="">Identitas Diri</option>
                    <option value="1">KTP</option>
                    <option value="2">SIM</option>
                    <option value="3">Domisili</option>
                    <option value="4">Tidak Ada</option>
                </select>
            </div>
        </div>

        <div class="row me-4 ms-4 mt-3">
            <div class="col-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nomor Identitas</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="Nomor Identitas">
                </div>
            </div>
        </div>

        <div class="row me-4 ms-4 mt-3">
            <label for="exampleFormControlInput1" class="form-label">Keterangan Tidak Mampu</label>
            <div class="col-5">
                <select class="form-select" aria-label="Default select example">
                    <option selected="">Keterangan Tidak Mampu</option>
                    <option value="1">SKTM</option>
                    <option value="2">Gakin</option>
                    <option value="3">Jamskesmas</option>
                    <option value="4">Terlampir</option>
                    <option value="5">Tidak Ada</option>
                </select>
            </div>
        </div>

        <div class="row me-4 ms-4 mt-3">
            <div class="col-5">
                <div class="">
                    <label for="exampleFormControlInput1" class="form-label">Nomor Keterangan Tidak Mampu</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="Nomor Keterangan Tidak Mampu">
                </div>
            </div>
        </div>

        <div class="row me-4 ms-4 mt-3">
            <label for="exampleFormControlInput1" class="form-label">Pekerjaan</label>
            <div class="col-5">
                <select class="form-select" aria-label="Default select example">
                    <option selected="">Pekerjaan</option>
                    <option value="1">Pekerja Tetap</option>
                    <option value="2">Pekerja Tidak Tetap</option>
                    <option value="3">Pekerja Lepas</option>
                    <option value="4">PNS</option>
                    <option value="5">Pensiunan</option>
                    <option value="5">Purnawirawan</option>
                    <option value="5">Tidak Bekerja</option>
                </select>
            </div>
        </div>

        <div class="row me-4 ms-4 mt-3">
                <label for="jumlahAnak">Jumlah Tanggungan</label> <span style="font-size: 10px; opacity: 0.4;">*tidak termasuk
                    anak atau kosongi jika tidak memiliki tanggungan</span>
            <div class="col-4">
                <div class="input-group">
                    <input type="number" class="form-control" id="jumlahAnak" name="jumlahAnak" min="0">
                    <div class="input-group-append">
                        <span class="input-group-text">orang</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row me-4 ms-4 mt-3">
            <label for="exampleFormControlInput1" class="form-label">Pendidikan Terakhir</label>
            <div class="col-5">
                <select class="form-select" aria-label="Default select example">
                    <option selected="">Pendidikan Terakhir</option>
                    <option value="1">SD</option>
                    <option value="2">SMP</option>
                    <option value="3">SMA</option>
                    <option value="4">Akademi</option>
                    <option value="5">Perguruan Tinggi</option>
                </select>
            </div>
        </div>

        <div class="row me-4 ms-4 mt-3">
            <div class="col-5">
                <label for="exampleFormControlInput1" class="form-label">Telpon</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Telpon">
            </div>
        </div>

        <div class="row me-4 ms-4 mt-3">
            <div class="col-5">
                <label for="exampleFormControlInput1" class="form-label">HP</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="HP">   
            </div>
        </div>

        <div class="me-4 ms-4 mt-3">
            <label for="exampleFormControlTextarea1" class="form-label"><b>Uraian Singkat Pokok Persoalan</b></label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
        </div>

        <div class="row me-4 ms-4 mt-3">
            <p>Demikian permohonan ini saya buat dengan sesungguhnya untuk keperluan mendapatkan bantuan hukum.</p>
            <label for="exampleFormControlInput1" class="form-label">Dibuat di:</label>
            <div class="col-5">
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Kota">
            </div>
            <div class="col-2">
                <span><b>31 May 2024</b></span>
            </div>
        </div>

        <div class="container me-4 ms-4 mt-3">
            <div class="row">
                <form>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">
                            <div class="card">
                                <div class="card-body">
                                    <i class="bi bi-image" id="placeholder-icon" style="font-size: 2rem;"></i>
                                    <i class="bi bi-plus-circle" id="placeholder-icon-plus"
                                        style="font-size: 1.5rem; margin-left: 0.5rem;"></i>
                                    <img id="output" class="img-fluid" />
                                </div>
                            </div>
                        </label>
                        <input class="form-control" type="file" id="formFile" style="display: none;" accept="image/*"
                            onchange="previewImage(event)">
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Nama Terang Pemohon</p>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-warning" >
                        Submit
                    </button>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
        <div class="pembatas"></div>
        <script>
            function previewImage(event) {
                var output = document.getElementById('output');
                var placeholderIcon = document.getElementById('placeholder-icon');
                var placeholderIconPlus = document.getElementById('placeholder-icon-plus');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function () {
                    URL.revokeObjectURL(output.src); // Free memory
                }
                output.style.display = 'block';
                placeholderIcon.style.display = 'none';
                placeholderIconPlus.style.display = 'none';
            }
        </script>
    </div>
</x-layout>