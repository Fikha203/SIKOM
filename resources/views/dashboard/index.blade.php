@extends('layouts.main')

@section('links')
    {{-- Simple DataTable --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}" />
    {{-- Sweetalert --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}" />
@endsection
@section('content')
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
                                <th>Judul</th>
                                <th>No Kendali</th>
                                <th>Jenis</th>
                                <th>Tipe</th>
                                <th>Pendanaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengajuans as $pengajuan)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
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
                                        {{ $pengajuan->tipe }}
                                    </td>
                                    <td>
                                        {{ $pengajuan->pendanaan }}
                                    </td>
                                    <td>
                                        <div class="d-flex">

                                            <a data-bs-toggle="tooltip" data-bs-original-title="Rincian dari pengajuan kamu"
                                                href="/dashboard/pengajuans/{{ $pengajuan->id }}"
                                                class="btn btn-info px-2 pt-2">
                                                <span class="fa-fw fa-lg select-all fas"></span>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
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
@endsection

@section('scripts')
    {{-- SweetAlert --}}
    <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
    @vite(['resources/js/sweetalert/swalMulti.js'])
    {{-- Simple DataTable --}}
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    @vite(['resources/js/simple-datatable/pengajuans.js'])
@endsection
