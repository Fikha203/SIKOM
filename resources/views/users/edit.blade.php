@extends('layouts.main')



@section('content')
    <div class="page-heading mb-0">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h2>Setting</h2>
                    <p class="text-subtitle text-muted">
                        Lakukan set-up pada beberapa data yang kamu miliki.
                    </p>
                    <hr>
                    <div class="mb-4">
                        <a data-bs-toggle="tooltip" data-bs-original-title="Kembali ke halaman sebelumnya."
                            href="{{ $previousUrl }}" class="btn btn-secondary px-2 pt-2 me-1">
                            <span class="fa-fw fa-lg select-all fas text-white"></span>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="/users/{{ $user->id }}">Akun</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Pengaturan
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card mb-5">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h3 class="card-title">Pengguna</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form" action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-6 col-12 mb-1">
                                <div class="form-group has-icon-left mandatory @error('name') is-invalid @enderror">
                                    <label for="name" class="form-label">Nama</label>
                                    <div class="position-relative">
                                        <input @if ($user->level != 'staff') @readonly(true) @endif type="text"
                                            class="form-control py-2" placeholder="e.g. Muhammad Taufik" id="name"
                                            name="name" value="{{ old('name', $user->name) }}" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-person py-2"></i>
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mb-1">
                                <div class="form-group has-icon-left mandatory @error('email') is-invalid @enderror">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="position-relative">
                                        <input type="email" class="form-control py-2" placeholder="e.g. hakim@gmail.com"
                                            id="email" name="email" value="{{ old('email', $user->email) }}"
                                            maxlength="255" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope-paper py-2"></i>
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @if ($user->level == 'mahasiswa')
                                <div class="col-md-6 col-12 mb-1">
                                    <div class="form-group has-icon-left mandatory @error('nim') is-invalid @enderror">
                                        <label for="nim" class="form-label">NIM</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control py-2"
                                                placeholder="e.g. 215150999999999" id="nim" name="nim"
                                                value="{{ old('nim', $user->mahasiswa->nim) }}" maxlength="16" />
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-vcard py-2"></i>
                                            </div>
                                            @error('nik')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-1">
                                    <div class="form-group mandatory @error('prodi') is-invalid @enderror">
                                        <label for="prodi" class="form-label">Prodi</label>
                                        <div class="position-relative">
                                            <select class="form-select" id="prodi" name="prodi">
                                                <option value="Teknik Informatika"
                                                    @if ($user->mahasiswa->prodi == 'Teknik Informatika') selected @endif>TIF</option>
                                                <option value="Sistem Informasi"
                                                    @if ($user->mahasiswa->prodi == 'Sistem Informasi') selected @endif>SI</option>
                                                <option value="Teknologi Informasi"
                                                    @if ($user->mahasiswa->prodi == 'Teknologi Informasi') selected @endif>TI</option>
                                                <option value="Teknik Komputer"
                                                    @if ($user->mahasiswa->prodi == 'Teknik Komputer') selected @endif>TEKKOM</option>
                                            </select>
                                            @error('prodi')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-1">
                                    <div class="form-group has-icon-left mandatory @error('angkatan') is-invalid @enderror">
                                        <label for="angkatan" class="form-label">Angkatan</label>
                                        <div class="position-relative">
                                            <input type="angkatan" class="form-control py-2" placeholder="e.g. 2021"
                                                id="angkatan" name="angkatan"
                                                value="{{ old('angkatan', $user->mahasiswa->angkatan) }}"
                                                maxlength="255" />
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge py-2"></i>
                                            </div>
                                            @error('angkatan')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <div class="row">
                            <div class="col-12 mb-1">
                                {{-- @if ($user->level == 'masyarakat')
                                    <div class="form-group has-icon-left mandatory @error('nisn') is-invalid @enderror">
                                        <label for="nisn" class="form-label">NISN</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control py-2" placeholder="e.g. 1050241708"
                                                id="nisn" name="nisn"
                                                value="{{ old('nisn', $user->student->nisn) }}" maxlength="10" />
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-vcard py-2"></i>
                                            </div>
                                            @error('nisn')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div> --}}
                                @if ($user->level == 'staff')
                                    <div class="form-group has-icon-left mandatory @error('nip') is-invalid @enderror">
                                        <label for="nip" class="form-label">NIP</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control py-2"
                                                placeholder="e.g. 105024170890000112" id="nip" name="nip"
                                                value="{{ old('nip', optional($user->staff)->nip) }}" maxlength="18" />
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-vcard py-2"></i>
                                            </div>
                                            @error('nip')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3 d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
