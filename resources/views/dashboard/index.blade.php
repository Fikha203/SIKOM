@extends('layouts.main')

@section('links')
    {{-- Simple DataTable --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}" />
    {{-- Sweetalert --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}" />

    {{-- filepond --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">

    {{-- Quill --}}
    @can('staff')
        <link rel="stylesheet" href="{{ asset('assets/extensions/quill/quill.snow.css') }}" />
    @endcan
@endsection
@section('content')
    @can('mahasiswa')
        <div class="page-heading mb-0">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h2>Semua Pengajuan kamu</h2>
                        <p class="text-subtitle text-muted">
                            Keseluruhan data dari pengajuan kamu.
                        </p>
                        <hr>
                        <div class="mb-4">
                            <a data-bs-toggle="tooltip" data-bs-original-title="Buat pengajuan baru" href="/dashboard"
                                class="btn btn-success px-2 pt-2 me-1">
                                <span class="fa-fw fa-lg select-all fas text-white"></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Pengajuan
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h3>Pengajuan</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>

                                    <th></th>
                                    <th>Judul</th>
                                    <th>No Kendali</th>
                                    <th>Jenis</th>
                                    <th>Pendanaan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengajuans as $pengajuan)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            @if ($pengajuan->tipe == 'baru')
                                                <span class="badge bg-danger">
                                                    {{ $pengajuan->tipe }}
                                                </span>
                                            @elseif ($pengajuan->tipe == 'revisi')
                                                <span class="badge bg-warning">
                                                    {{ $pengajuan->tipe }}
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            {{ $pengajuan->judul }}
                                        </td>
                                        <td>
                                            {{ $pengajuan->no_kendali }}
                                        </td>
                                        <td>
                                            {{ $pengajuan->jenis }}
                                        </td>

                                        <td>
                                            {{ $pengajuan->pendanaan }}
                                        </td>
                                        <td>

                                            @if ($pengajuan->status == 'diproses')
                                                <span class="badge bg-light-secondary">
                                                    {{ $pengajuan->status }}
                                                </span>
                                            @elseif ($pengajuan->status == 'revisi')
                                                <span class="badge bg-light-warning">
                                                    perlu revisi
                                                </span>
                                            @elseif ($pengajuan->status == 'ditolak')
                                                <span class="badge bg-light-danger">
                                                    {{ $pengajuan->status }}
                                                </span>
                                            @endif



                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <span data-bs-toggle="modal" data-bs-target="#modal-edit"
                                                    data-pengajuan="{{ $pengajuan }}" data-url="{{ asset('') }}"> <a
                                                        data-bs-toggle="tooltip" data-bs-original-title="Edit pengajuan"
                                                        class="btn icon"><i class="bi bi-pencil-square"></i></a>
                                                </span>
                                                <span data-bs-toggle="modal" data-bs-target="#modal-info"
                                                    data-pengajuan="{{ $pengajuan }}">
                                                    <a data-bs-toggle="tooltip"
                                                        data-bs-original-title="Rincian pengajuan"class="btn icon"><i
                                                            class="bi bi-info-circle"></i></a>
                                                </span>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            <p class="text-center mt-3">Tidak ada laporan :(</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    @endcan
    @can('staff')
        <div class="page-heading mb-0">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h2>Daftar Pengajuan</h2>
                        <p class="text-subtitle text-muted">
                            Keseluruhan data dari semua pengajuan.
                        </p>
                        <hr>

                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Pengajuan
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h3>Pengajuan Terbaru</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>

                                    <th></th>
                                    <th>Judul</th>
                                    <th>No Kendali</th>
                                    <th>Jenis</th>
                                    <th>Pendanaan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengajuans as $pengajuan)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            @if ($pengajuan->tipe == 'baru')
                                                <span class="badge bg-danger">
                                                    {{ $pengajuan->tipe }}
                                                </span>
                                            @elseif ($pengajuan->tipe == 'revisi')
                                                <span class="badge bg-warning">
                                                    {{ $pengajuan->tipe }}
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            {{ $pengajuan->judul }}
                                        </td>
                                        <td>
                                            {{ $pengajuan->no_kendali }}
                                        </td>
                                        <td>
                                            {{ $pengajuan->jenis }}
                                        </td>

                                        <td>
                                            {{ $pengajuan->pendanaan }}
                                        </td>
                                        <td>
                                            @if ($pengajuan->status == 'diproses')
                                                <span class="badge bg-light-secondary">
                                                    {{ $pengajuan->status }}
                                                </span>
                                            @elseif ($pengajuan->status == 'revisi')
                                                <span class="badge bg-light-warning">
                                                    perlu revisi
                                                </span>
                                            @elseif ($pengajuan->status == 'ditolak')
                                                <span class="badge bg-light-danger">
                                                    {{ $pengajuan->status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">


                                                <span data-bs-toggle="modal" data-bs-target="#modal-edit"
                                                    data-pengajuan="{{ $pengajuan }}" data-url="{{ asset('') }}"> <a
                                                        data-bs-toggle="tooltip" data-bs-original-title="Edit pengajuan"
                                                        class="btn icon"><i class="bi bi-pencil-square"></i></a>
                                                </span>
                                                <span data-bs-toggle="modal" data-bs-target="#modal-info"
                                                    data-pengajuan="{{ $pengajuan }}">
                                                    <a data-bs-toggle="tooltip"
                                                        data-bs-original-title="Rincian pengajuan"class="btn icon"><i
                                                            class="bi bi-info-circle"></i></a>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            <p class="text-center mt-3">Tidak ada laporan :(</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    @endcan
    <div class="modal fade text-left" id="modal-info" tabindex="-1" role="dialog" aria-labelledby="modal-info-title"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-info-title"></h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="mt-2">Status:</h6>
                    <span id="status"></span>

                    <h6 class="mt-2">Judul:</h6>
                    <span id="judul"></span>

                    <h6 class="mt-2">Lembaga:</h6>
                    <span id="lembaga"></span>

                    <h6 class="mt-3">Nama Ketua Pelaksana:</h6>
                    <span id="nama-ketua"></span>

                    <h6 class="mt-3">NIM:</h6>
                    <span id="nim-ketua"></span>

                    <h6 class="mt-3">Nomor:</h6>
                    <span id="no-ketua"></span>

                    <h6 class="mt-3">Hasil Kegiatan:</h6>
                    <span id="hasil-kegiatan"></span>

                    <h6 class="mt-2">Catatan</h6>
                    <span id="catatan"></span>

                    <h6 class="mt-3">Berkas:</h6>

                    <h6 class="mt-2">Kartu Kendali</h6>
                    <a href="" id="berkas-1"></a>
                    <h6 class="mt-2"> Bukti ACC Keuangan</h6>
                    <a href="" id="berkas-2"></a>
                    <h6 class="mt-2">Laporan Pertanggung Jawaban</h6>
                    <a href="" id="berkas-3"></a>
                    <h6 class="mt-2">Sertifikat Pemenang Lomba</h6>
                    <a href="" id="berkas-4"></a>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-info-title"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-edit-title">Edit Pengajuan</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" action="" method="POST" data-parsley-validate
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        @can('mahasiswa')
                            <h6 class="mt-2">Status:</h6>
                            <span id="status"></span>
                        @endcan()



                        <h6 class="mt-2">Judul:</h6>
                        <span id="judul"></span>

                        <h6 class="mt-2">Lembaga:</h6>
                        <span id="lembaga"></span>

                        <h6 class="mt-3">Nama Ketua Pelaksana:</h6>
                        <span id="nama-ketua"></span>

                        <h6 class="mt-3">NIM:</h6>
                        <span id="nim-ketua"></span>

                        <h6 class="mt-3">Nomor:</h6>
                        <span id="no-ketua"></span>

                        <h6 class="mt-3">Hasil Kegiatan:</h6>
                        <span id="hasil-kegiatan"></span>

                        @can('mahasiswa')
                            <h6 class="mt-2">Catatan</h6>
                            <span id="catatan"></span>
                        @endcan

                        @can('staff')
                            <div class="form-group mandatory @error('catatan') is-invalid @enderror">
                                <div class="position-relative">
                                    <h6 class="mt-2">Catatan</h6>

                                    <input id="input-catatan" name="catatan" value="" type="hidden">
                                    <div id="editor">

                                    </div>

                                    @error('catatan')
                                        <div class="parsley-error filled" id="parsley-id-3" aria-hidden="false">
                                            <span class="parsley-required">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        @endcan

                        @can('mahasiswa')
                            <div class="form-group mandatory @error('tipe') is-invalid @enderror">
                                <h6 class="mt-3">Baru/Revisi</h6>
                                <div class="position-relative">
                                    <select class="form-select" id="select-tipe" name="tipe">
                                        <option value="baru">Baru</option>
                                        <option value="revisi">Revisi</option>
                                    </select>
                                    @error('tipe')
                                        <div class="parsley-error filled" id="parsley-id-1" aria-hidden="false">
                                            <span class="parsley-required">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        @endcan()

                        @can('staff')
                            <div class="form-group mandatory @error('status') is-invalid @enderror">
                                <h6 class="mt-3">Status</h6>
                                <div class="position-relative">
                                    <select class="form-select" id="select-status" name="status">
                                        <option value="diproses">Diproses</option>
                                        <option value="revisi">Perlu Revisi</option>
                                        <option value="ditolak">ditolak</option>
                                    </select>
                                    @error('status')
                                        <div class="parsley-error filled" id="parsley-id-1" aria-hidden="false">
                                            <span class="parsley-required">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        @endcan()

                        @can('staff')
                            <h6 class="mt-3">Berkas:</h6>

                            <h6 class="mt-2">Kartu Kendali</h6>
                            <a href="" id="berkas-1"></a>
                            <h6 class="mt-2"> Bukti ACC Keuangan</h6>
                            <a href="" id="berkas-2"></a>
                            <h6 class="mt-2">Laporan Pertanggung Jawaban</h6>
                            <a href="" id="berkas-3"></a>
                            <h6 class="mt-2">Sertifikat Pemenang Lomba</h6>
                            <a href="" id="berkas-4"></a>
                        @endcan



                        @can('mahasiswa')
                            <input type="file" class="filepond-upload-kendali" id="upload_kendali" name="upload_kendali">

                            <h6 class="mt-2"> Bukti ACC Keuangan</h6>
                            <input type="file" class="filepond-upload-acc" id="upload_kendali"
                                name="upload_acc_keuangan">

                            <h6 class="mt-2">Laporan Pertanggung Jawaban</h6>
                            <input type="file" class="filepond-upload-lpj" id="upload_kendali" name="upload_lpj">

                            <h6 class="mt-2">Sertifikat Pemenang Lomba</h6>
                            <input type="file" class="filepond-upload-sertifikat" id="upload_kendali"
                                name="upload_sertifikat_lomba">
                        @endcan()

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- jquery --}}
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    {{-- SweetAlert --}}
    <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
    @vite(['resources/js/sweetalert/swalMulti.js'])
    {{-- Simple DataTable --}}
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    @vite(['resources/js/simple-datatable/pengajuans.js'])

    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/form-element-select.js') }} "></script>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>

    {{-- filepond --}}
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/filepond.js') }}"></script>
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

    {{-- Quill Editor --}}
    {{-- Quill --}}
    @can('staff')
        <script src="{{ asset('assets/extensions/quill/quill.min.js') }}"></script>
        @vite(['resources/js/quill/catatan.js'])
    @endcan
    <script></script>
    @vite(['resources/js/uploader/uploader.js'])
@endsection
