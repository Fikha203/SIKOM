@extends('auth.main')

@section('content')
    <div class="row d-flex justify-content-center">

        {{-- <div class="col-12 col-sm-5 bg pt-3">
            <div class=" d-flex pt-3 pt-sm-0 align-items-center">
                <a href="/" class=" ms-3 ms-sm-5 me-auto  mb-2 mb-sm-5 logo-login">
                   
                    @if (strpos(config('web_config')['WEB_LOGO_WHITE'], '/') === false)
                        <img src="{{ asset('images/' . config('web_config')['WEB_LOGO_WHITE']) }}"
                            alt="Logo {{ config('web_config')['WEB_TITLE'] }}">
                    @else
                        <img src="{{ asset('storage/' . config('web_config')['WEB_LOGO_WHITE']) }}"
                            alt="Logo {{ config('web_config')['WEB_TITLE'] }}">
                    @endif
                </a>
                <div class="text-end me-3 ms-sm-5 mb-2 mb-sm-5 d-block d-sm-none">
                    <a href="/" class="text-white opacity-75">Kembali</a>
                </div>
            </div>
            <div class="text-center illus-login">
                <img src="{{ asset('images/illust2.png') }}" alt="logo" width="60%" />
            </div>
        </div> --}}

        <div class="col-12 col-sm-7 pt-3">
            <h1 class="w-100 fw-bold text-center mt-5 mt-sm-0 mb-0 p-0 pt-sm-5 fs-3">Daftar</h1>

            {{-- @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible show fade">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif --}}

            <div class="card mt-5 p-sm-4 p-2 mb-0 border-start-0 border-end-0 margin-form">
                <div class="card-body">
                    <form class="form" action="/register" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 col-12 mb-1">
                                <div class="form-group has-icon-left mandatory @error('name') is-invalid @enderror">
                                    <label for="name" class="form-label">Nama</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control py-2" placeholder="e.g. Muhammad Taufik"
                                            id="name" name="name" value="{{ old('name') }}" />
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
                                <div class="form-group has-icon-left mandatory @error('nim') is-invalid @enderror">
                                    <label for="nim" class="form-label">NIM</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control py-2" placeholder="e.g. 215150999999999"
                                            id="nim" name="nim" value="{{ old('nim') }}" maxlength="16" />
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
                            {{-- <div class="col-md-6 col-12 mb-1">
                                <div class="form-group has-icon-left mandatory @error('username') is-invalid @enderror">
                                    <label for="username" class="form-label">Username</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control py-2" placeholder="mufikha" id="username"
                                            name="username" value="{{ old('username') }}" maxlength="255" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-at py-2"></i>
                                        </div>
                                        @error('username')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6 col-12 mb-1">
                                <div class="form-group has-icon-left mandatory @error('email') is-invalid @enderror">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="position-relative">
                                        <input type="email" class="form-control py-2"
                                            placeholder="e.g. taufik.mh@gmail.com" id="email" name="email"
                                            value="{{ old('email') }}" maxlength="255" />
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
                            <div class="col-md-6 col-12 mb-1">
                                <div class="form-group mandatory @error('prodi') is-invalid @enderror">
                                    <label for="prodi" class="form-label">Prodi</label>
                                    <div class="position-relative">
                                        {{-- <input type="email" class="form-control py-2"
                                            placeholder="e.g. taufik.mh@gmail.com" id="email" name="email"
                                            value="{{ old('email') }}" maxlength="255" /> --}}
                                        <select class="form-select" id="prodi" name="prodi">
                                            <option value="Teknik Informatika">TIF</option>
                                            <option value="Sistem Informasi">SI</option>
                                            <option value="Teknologi Informasi">TI</option>
                                            <option value="Teknik Komputer">TEKKOM</option>
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
                                            id="angkatan" name="angkatan" value="{{ old('angkatan') }}" maxlength="255" />
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
                            <div class="col-md-6 col-12 mb-1">
                                <div class="form-group has-icon-left mandatory @error('password') is-invalid @enderror">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control py-2" placeholder="e.g. 4kuBu7uhM3dk1t"
                                            id="password" name="password" maxlength="255" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-key py-2"></i>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mb-1">
                                <div
                                    class="form-group has-icon-left mandatory @error('password_confirmation') is-invalid @enderror">
                                    <label for="password_confirmation" class="form-label">Konfirmasi
                                        Password</label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control py-2"
                                            placeholder="e.g. 4kuBu7uhM3dk1t" id="password_confirmation"
                                            name="password_confirmation" maxlength="255" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-key-fill py-2"></i>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            {{-- <div class="col-md-6 col-12 mb-1">
                            <div class="form-group mandatory @error('level') text-danger is-invalid @enderror">
                                <fieldset>
                                    <label class="form-label">
                                        Status
                                    </label>
                                    <div class="d-flex">
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="level"
                                                id="level-masyarakat" value="masyarakat"
                                                @if (old('level') == 'masyarakat') checked @endif />
                                            <label data-bs-toggle="tooltip"
                                                data-bs-original-title="Status pengguna sebagai masyarakat."
                                                class="form-check-label form-label" for="level-masyarakat">
                                                Masyarakat
                                            </label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="level"
                                                id="level-pegawai" value="pegawai"
                                                @if (old('level') == 'pegawai') checked @endif />
                                            <label data-bs-toggle="tooltip"
                                                data-bs-original-title="Status pengguna sebagai pegawai."
                                                class="form-check-label form-label" for="level-pegawai">
                                                Pegawai
                                            </label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="level"
                                                id="level-admin" value="admin"
                                                @if (old('level') == 'admin') checked @endif />
                                            <label data-bs-toggle="tooltip"
                                                data-bs-original-title="Status pengguna sebagai admin."
                                                class="form-check-label form-label" for="level-admin">
                                                Admin
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                @error('level')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> --}}
                        </div>
                        {{-- <div class="row">
                        <div class="col-12 mb-1">
                            <div class="form-group ">
                                <div class="position-relative">
                                    <label for="image" class="form-label">Foto</label>

                                    <!-- Auto crop image file uploader -->
                                    <input type="file" class="image-crop-filepond" name="image" />

                                    @error('image')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div> --}}
                        <input type="hidden" name="level" value="mahasiswa">
                        <div class="row">
                            <div class="text-start mt-3 mb-2">
                                <button type="submit" class="w-100 btn btn-primary text-white p-2">Daftar</button>
                            </div>
                        </div>
                    </form>
                    <small class="card-subtitle text-muted">
                        Sudah punya akun?
                        <a href="/login">Login</a>
                    </small>
                </div>
            </div>
            {{-- <div class="d-flex justify-content-center">
                @include('auth.layouts.footer')
            </div> --}}
        </div>
    </div>
@endsection
