@extends('layouts.main')

@section('links')
    {{-- Simple DataTable --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}" />
    {{-- Sweetalert --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">

    {{-- filepond --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
@endsection

@section('content')
    @can('mahasiswa')
        <div class="page-heading">
            <div class="page-titile">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-first order-second">

                        <h2>Pilih Layanan Pengajuan yang Anda Butuhkan</h2>



                    </div>
                    <div class="col-12 col-md-6 order-md-second order-first">

                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <a href="/dashboard">Dashboard</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-12"></div>
                    <p class="text-subtitle text-muted">
                        Proposal atau LPJ?
                    </p>
                    <hr>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Isi Form Berikut</h5>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="proposal-tab" data-bs-toggle="tab" href="#proposal"
                                            role="tab" aria-controls="proposal" aria-selected="true">Proposal</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="lpj-tab" data-bs-toggle="tab" href="#lpj" role="tab"
                                            aria-controls="lpj" aria-selected="false">LPJ</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="proposal" role="tabpanel"
                                        aria-labelledby="proposal-tab">

                                    </div>
                                    <div class="tab-pane fade" id="lpj" role="tabpanel" aria-labelledby="lpj-tab">
                                        <section id="multiple-column-form">
                                            <div class="row match-height">
                                                <div class="col-12">
                                                    <div class="card">
                                                        {{-- <div class="card-header">
                                                        <h3 class="card-title mb-0">Kronologi</h3>
                                                    </div> --}}
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <form class="form" action="/dashboard/pengajuans"
                                                                    method="POST" data-parsley-validate
                                                                    enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="row">
                                                                        <div class="col-md-6 col-12 mb-1">
                                                                            <div
                                                                                class="form-group has-icon-left mandatory @error('judul') is-invalid @enderror">
                                                                                <label for="judul"
                                                                                    class="form-label">Judul</label>
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                        class="form-control py-2"
                                                                                        placeholder="Judul pengajuan"
                                                                                        id="judul" name="judul"
                                                                                        value="{{ old('judul') }}" />
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-card-heading py-2"></i>
                                                                                    </div>
                                                                                    @error('judul')
                                                                                        <div class="parsley-error filled"
                                                                                            id="parsley-id-1" aria-hidden="false">
                                                                                            <span
                                                                                                class="parsley-required">{{ $message }}</span>
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12 mb-1">
                                                                            <div
                                                                                class="form-group has-icon-left mandatory @error('no_kendali') is-invalid @enderror">
                                                                                <label for="no_kendali" class="form-label">No.
                                                                                    Kendali</label>
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                        class="form-control py-2"
                                                                                        placeholder="nomor kendali"
                                                                                        id="no_kendali" name="no_kendali"
                                                                                        value="{{ old('no_kendali') }}" />
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-person-badge py-2"></i>
                                                                                    </div>
                                                                                    @error('no_kendali')
                                                                                        <div class="parsley-error filled"
                                                                                            id="parsley-id-2" aria-hidden="false">
                                                                                            <span
                                                                                                class="parsley-required">{{ $message }}</span>
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12 mb-1">
                                                                            <div
                                                                                class="form-group has-icon-left mandatory @error('tipe') is-invalid @enderror">
                                                                                <label for="tipe"
                                                                                    class="form-label">Baru/Revisi</label>
                                                                                <div class="position-relative">
                                                                                    <select class="form-select" id="tipe"
                                                                                        name="tipe">
                                                                                        <option value="baru">Baru</option>
                                                                                        <option value="revisi">Revisi</option>
                                                                                    </select>
                                                                                    @error('tipe')
                                                                                        <div class="parsley-error filled"
                                                                                            id="parsley-id-1" aria-hidden="false">
                                                                                            <span
                                                                                                class="parsley-required">{{ $message }}</span>
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12 mb-1">
                                                                            <div
                                                                                class="form-group has-icon-left mandatory @error('pendanaan') is-invalid @enderror">
                                                                                <label for="pendanaan"
                                                                                    class="form-label">Dana/Non Dana</label>
                                                                                <div class="position-relative">
                                                                                    <select class="form-select" id="pendanaan"
                                                                                        name="pendanaan">
                                                                                        <option value="dana">Dana</option>
                                                                                        <option value="non_dana">Non
                                                                                            Dana
                                                                                        </option>
                                                                                    </select>
                                                                                    @error('pendanaan')
                                                                                        <div class="parsley-error filled"
                                                                                            id="parsley-id-1" aria-hidden="false">
                                                                                            <span
                                                                                                class="parsley-required">{{ $message }}</span>
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 mb-1">
                                                                            <div
                                                                                class="form-group has-icon-left mandatory @error('lembaga') is-invalid @enderror">
                                                                                <label for="lembaga"
                                                                                    class="form-label">Lembaga</label>
                                                                                <div class="position-relative">
                                                                                    <select class="form-select" id="lembaga"
                                                                                        name="lembaga">
                                                                                        <option
                                                                                            value="Badan Eksekutif Mahasiswa">
                                                                                            Badan Eksekutif Mahasiswa
                                                                                        </option>
                                                                                        <option
                                                                                            value="Dewan Perwakilan Mahasiswa">
                                                                                            Dewan Perwakilan Mahasiswa
                                                                                        </option>
                                                                                        <option
                                                                                            value="Departemen Sistem Informasi">
                                                                                            Departemen Sistem Informasi
                                                                                        </option>
                                                                                        <option
                                                                                            value="Departemen Teknik Informatika">
                                                                                            Departemen Teknik Informatika
                                                                                        </option>
                                                                                        <option value="DISPLAY">DISPLAY
                                                                                        </option>
                                                                                        <option value="RAION">RAION
                                                                                        </option>
                                                                                        <option value="OPTIIK">OPTIIK
                                                                                        </option>
                                                                                        <option value="BIOS">BIOS
                                                                                        </option>
                                                                                        <option value="LKI-AMD">LKI-AMD
                                                                                        </option>
                                                                                        <option value="BCC">BCC
                                                                                        </option>
                                                                                        <option value="ROBOTIKA">ROBOTIKA
                                                                                        </option>
                                                                                        <option value="Tim/Kelompok">
                                                                                            Tim/Kelompok
                                                                                        </option>
                                                                                        <option value="Individu">Individu
                                                                                        </option>

                                                                                    </select>
                                                                                    @error('tipe')
                                                                                        <div class="parsley-error filled"
                                                                                            id="parsley-id-1" aria-hidden="false">
                                                                                            <span
                                                                                                class="parsley-required">{{ $message }}</span>
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 col-12 mb-1">
                                                                            <div
                                                                                class="form-group has-icon-left mandatory @error('nama_ketua') is-invalid @enderror">
                                                                                <label for="nama_ketua"
                                                                                    class="form-label">Nama Ketua
                                                                                    Pelaksana</label>
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                        class="form-control py-2"
                                                                                        placeholder="nama ketua"
                                                                                        id="nama_ketua" name="nama_ketua"
                                                                                        value="{{ old('nama_ketua') }}" />
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-card-heading py-2"></i>
                                                                                    </div>
                                                                                    @error('nama_ketua')
                                                                                        <div class="parsley-error filled"
                                                                                            id="parsley-id-1" aria-hidden="false">
                                                                                            <span
                                                                                                class="parsley-required">{{ $message }}</span>
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 col-12 mb-1">
                                                                            <div
                                                                                class="form-group has-icon-left mandatory @error('nim_ketua') is-invalid @enderror">
                                                                                <label for="nim_ketua" class="form-label">NIM
                                                                                    Ketua Pelaksana</label>
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                        class="form-control py-2"
                                                                                        placeholder="Judul pengajuan"
                                                                                        id="nim_ketua" name="nim_ketua"
                                                                                        value="{{ old('nim_ketua') }}" />
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-card-heading py-2"></i>
                                                                                    </div>
                                                                                    @error('nim_ketua')
                                                                                        <div class="parsley-error filled"
                                                                                            id="parsley-id-1" aria-hidden="false">
                                                                                            <span
                                                                                                class="parsley-required">{{ $message }}</span>
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 col-12 mb-1">
                                                                            <div
                                                                                class="form-group has-icon-left mandatory @error('no_ketua') is-invalid @enderror">
                                                                                <label for="no_ketua" class="form-label">No.
                                                                                    WA Ketua Pelaksana</label>
                                                                                <div class="position-relative">
                                                                                    <input type="no_ketua"
                                                                                        class="form-control py-2"
                                                                                        placeholder="no. wa aktif"
                                                                                        id="no_ketua" name="no_ketua"
                                                                                        value="{{ old('no_ketua') }}" />
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-telephone py-2"></i>
                                                                                    </div>
                                                                                    @error('no_ketua')
                                                                                        <div class="parsley-error filled"
                                                                                            id="parsley-id-1" aria-hidden="false">
                                                                                            <span
                                                                                                class="parsley-required">{{ $message }}</span>
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 col-12 mb-1">
                                                                            <div
                                                                                class="form-group has-icon-left mandatory @error('no_rek') is-invalid @enderror">
                                                                                <label for="no_ketua" class="form-label">No.
                                                                                    Rekining</label>
                                                                                <div class="position-relative">
                                                                                    <input type="no_rek"
                                                                                        class="form-control py-2"
                                                                                        placeholder="nomer rekening Mandiri"
                                                                                        id="no_rek" name="no_rek"
                                                                                        value="{{ old('no_rek') }}" />
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-bank py-2"></i>
                                                                                    </div>
                                                                                    @error('no_rek')
                                                                                        <div class="parsley-error filled"
                                                                                            id="parsley-id-1" aria-hidden="false">
                                                                                            <span
                                                                                                class="parsley-required">{{ $message }}</span>
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 col-12 mb-1">
                                                                            <div
                                                                                class="form-group has-icon-left mandatory @error('bentuk') is-invalid @enderror">
                                                                                <label for="bentuk"
                                                                                    class="form-label">Bentuk Kegiatan</label>
                                                                                <div class="position-relative">
                                                                                    <select class="form-select" id="bentuk"
                                                                                        name="bentuk">

                                                                                        <option value="event_lomba">EVENT LOMBA
                                                                                            (Mengadakan Event)
                                                                                        </option>
                                                                                        <option value="finalis">Finalis Lomba
                                                                                            (Mengikuti Lomba)
                                                                                        </option>
                                                                                        <option value="student_exchange">
                                                                                            Student Exchange
                                                                                        </option>
                                                                                    </select>
                                                                                    @error('bentuk')
                                                                                        <div class="parsley-error filled"
                                                                                            id="parsley-id-1" aria-hidden="false">
                                                                                            <span
                                                                                                class="parsley-required">{{ $message }}</span>
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <hr>
                                                                        <div class="col-md-6 col-12 mb-1">
                                                                            <div
                                                                                class="form-group has-icon-left mandatory @error('no_rek') is-invalid @enderror">
                                                                                <label for="nominal_dana"
                                                                                    class="form-label">Nominal Dana Yang
                                                                                    Dilaporkan</label>
                                                                                <div class="position-relative">
                                                                                    <input type="nominal_dana"
                                                                                        class="form-control py-2"
                                                                                        placeholder="nominal dana"
                                                                                        id="nominal_dana" name="nominal_dana"
                                                                                        value="{{ old('nominal_dana') }}" />
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-bank py-2"></i>
                                                                                    </div>
                                                                                    @error('nominal_dana')
                                                                                        <div class="parsley-error filled"
                                                                                            id="parsley-id-1" aria-hidden="false">
                                                                                            <span
                                                                                                class="parsley-required">{{ $message }}</span>
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 col-12 mb-1">
                                                                            <div
                                                                                class="form-group has-icon-left mandatory @error('hasil_kegiatan') is-invalid @enderror">
                                                                                <label for="no_ketua" class="form-label">Hasil
                                                                                    Kegiatan Mahasiswa</label>
                                                                                <div class="position-relative">
                                                                                    <input type="hasil_kegiatan"
                                                                                        class="form-control py-2"
                                                                                        placeholder="Hasil Kegiatan"
                                                                                        id="hasil_kegiatan"
                                                                                        name="hasil_kegiatan"
                                                                                        value="{{ old('hasil_kegiatan') }}" />
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-bank py-2"></i>
                                                                                    </div>
                                                                                    @error('hasil_kegiatan')
                                                                                        <div class="parsley-error filled"
                                                                                            id="parsley-id-1" aria-hidden="false">
                                                                                            <span
                                                                                                class="parsley-required">{{ $message }}</span>
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 col-12 mb-1">
                                                                            <div
                                                                                class="form-group has-icon-left mandatory @error('email_ketua') is-invalid @enderror">
                                                                                <label for="email_ketua"
                                                                                    class="form-label">Email Ketua
                                                                                    Pelaksana</label>
                                                                                <div class="position-relative">
                                                                                    <input type="email_ketua"
                                                                                        class="form-control py-2"
                                                                                        placeholder="@gmail.com"
                                                                                        id="email_ketua" name="email_ketua"
                                                                                        value="{{ old('email_ketua') }}" />
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-bank py-2"></i>
                                                                                    </div>
                                                                                    @error('email_ketua')
                                                                                        <div class="parsley-error filled"
                                                                                            id="parsley-id-1" aria-hidden="false">
                                                                                            <span
                                                                                                class="parsley-required">{{ $message }}</span>
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        {{-- <div class="col-md-6 col-12 mb-1">
                                                                        <div
                                                                            class="form-group has-icon-left mandatory @error('email_ketua') is-invalid @enderror">
                                                                            <label for="email_ketua"
                                                                                class="form-label">Keterangan Revisi</label>
                                                                            <div class="position-relative">
                                                                                <input type="email_ketua"
                                                                                    class="form-control py-2"
                                                                                    placeholder="@gmail.com"
                                                                                    id="email_ketua" name="email_ketua"
                                                                                    value="{{ old('email_ketua') }}" />
                                                                                <div class="form-control-icon">
                                                                                    <i class="bi bi-bank py-2"></i>
                                                                                </div>
                                                                                @error('email_ketua')
                                                                                    <div class="parsley-error filled"
                                                                                        id="parsley-id-1" aria-hidden="false">
                                                                                        <span
                                                                                            class="parsley-required">{{ $message }}</span>
                                                                                    </div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}



                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12 mb-1">
                                                                            <div class="form-group ">
                                                                                <div class="position-relative">
                                                                                    <label for="upload_kendali"
                                                                                        class="form-label">Upload Kartu
                                                                                        Kendali</label>

                                                                                    <!-- File uploader basic -->

                                                                                    <input type="file"
                                                                                        class="basic-filepond"
                                                                                        id="upload_kendali"
                                                                                        name="upload_kendali">

                                                                                    @error('upload_kendali')
                                                                                        <div class="invalid-feedback">
                                                                                            {{ $message }}
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12 mb-1">
                                                                            <div class="form-group ">
                                                                                <div class="position-relative">
                                                                                    <label for="upload_acc_keuangan"
                                                                                        class="form-label">Upload Bukti
                                                                                        ACC</label>

                                                                                    <!-- File uploader basic -->

                                                                                    <input type="file"
                                                                                        class="basic-filepond"
                                                                                        id="upload_acc_keuangan"
                                                                                        name="upload_acc_keuangan">

                                                                                    @error('upload_acc_keuangan')
                                                                                        <div class="invalid-feedback">
                                                                                            {{ $message }}
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12 mb-1">
                                                                            <div class="form-group ">
                                                                                <div class="position-relative">
                                                                                    <label for="upload_lpj"
                                                                                        class="form-label">Upload LPJ</label>

                                                                                    <!-- File uploader basic -->

                                                                                    <input type="file"
                                                                                        class="basic-filepond" id="upload_lpj"
                                                                                        name="upload_lpj">

                                                                                    @error('upload_lpj')
                                                                                        <div class="invalid-feedback">
                                                                                            {{ $message }}
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12 mb-1">
                                                                            <div class="form-group ">
                                                                                <div class="position-relative">
                                                                                    <label for="upload_sertifikat_lomba"
                                                                                        class="form-label">Upload
                                                                                        Sertifikat Pemenang Lomba</label>

                                                                                    <!-- File uploader basic -->

                                                                                    <input type="file"
                                                                                        class="basic-filepond"
                                                                                        id="upload_sertifikat_lomba"
                                                                                        name="upload_sertifikat_lomba">

                                                                                    @error('upload_sertifikat_lomba')
                                                                                        <div class="invalid-feedback">
                                                                                            {{ $message }}
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="jenis" value="lpj">
                                                                    <input type="hidden" name="status" value="diproses">
                                                                    <div class="row">
                                                                        <div class="col-12 mt-2 d-flex justify-content-start">
                                                                            <button type="submit"
                                                                                class="btn btn-primary me-1 mb-1">
                                                                                Submit
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>


                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    @endcan


    @can('staff')
    @endcan
@endsection
@section('scripts')
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/form-element-select.js') }} "></script>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    {{-- Jquery --}}
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>

    {{-- filepond --}}
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/filepond.js') }} "></script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}"></script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}">
    </script>
    @vite(['resources/js/uploader/uploader.js'])
@endsection
