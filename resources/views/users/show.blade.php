@extends('layouts.main')

@section('links')
    {{-- SweetAlert --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}" />
@endsection

@section('content')
    <div class="page-heading mb-0">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h2>Profil</h2>
                    <p class="text-subtitle text-muted">
                        Keseluruhan data akun
                    </p>
                    <hr>
                    <div class="mb-4">
                        <a data-bs-toggle="tooltip" data-bs-original-title="Kembali ke halaman sebelumnya."
                            href="{{ $previousUrl }}" class="btn btn-secondary px-2 pt-2 me-1">
                            <span class="fa-fw fa-lg select-all fas text-white"></span>
                        </a>
                        @if (auth()->user()->id == $user->id)
                            <a data-bs-toggle="tooltip" data-bs-original-title="Edit akun kamu."
                                href="/users/{{ $user->id }}/edit" class="btn btn-warning px-2 pt-2 me-1">
                                <span class="fa-fw fa-lg select-all fas"></span>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Akun
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            {{-- Complaint --}}
            <div class="card mb-5">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h3 class="card-title">Pengguna</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        @if ($user->image)
                            <img width="150" class="rounded-circle" src="{{ asset("storage/$user->image") }}"
                                alt="{{ $user->username }}">
                        @else
                            <img width="150" class="rounded-circle" src="{{ asset('assets/static/images/faces/2.jpg') }}"
                                alt="{{ $user->name }}">
                        @endif


                        <h4 class="mt-4">{{ $user->name }}</h4>

                        {{-- <small class="text-muted">({{ htmlspecialchars('@' . $user->username) }})</small> --}}
                    </div>

                    <div class="divider">
                        {{-- <div class="divider-text">{{ htmlspecialchars('@' . $user->username) }}</div> --}}
                        <div class="divider-text">{{ $user->created_at->format('d F Y') }}</div>
                    </div>

                    <div class="container text-center justify-content-center">
                        <div class="row">
                            @if ($user->level == 'mahasiswa')
                                <div class="col-12 col-md-6">
                                    <h6>NIM: <span class="text-muted">{{ $user->mahasiswa->nim }}</span></h6>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h6>Prodi: <span class="text-muted">{{ $user->mahasiswa->prodi }}</span></h6>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h6>Angkatan: <span class="text-muted">{{ $user->mahasiswa->angkatan }}</span></h6>
                                </div>
                            @else
                                <div class="col-12 col-md-6">
                                    <h6>NIP: <span class="text-muted">{{ optional($user->staff)->nip }}</span>
                                    </h6>
                                </div>
                            @endif


                            <div class="col-12 col-md-6">
                                <div class="">
                                    <h6>Email: <span class="text-muted">{{ $user->email }}</span></h6>
                                </div>
                            </div>



                            <div class="col-12 col-md-6">
                                <div class="">
                                    <h6>Status: <span class="text-muted">{{ ucwords($user->level) }}</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </div>
    </section>
    </div>
@endsection

@section('scripts')
    {{-- SweetAlert --}}
    @vite(['resources/js/sweetalert/swalSingle.js'])
    <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection
