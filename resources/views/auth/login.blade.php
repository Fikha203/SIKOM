@extends('auth.main')

@section('content')
    {{-- <div class="col-12 col-sm-5 bg pt-3">
        <div class=" d-flex pt-3 pt-sm-0 align-items-center">
            <a href="/" class=" ms-3 ms-sm-5 me-auto  mb-2 mb-sm-5 logo-login">
          
            </a>
            <div class="text-end me-3 ms-sm-5 mb-2 mb-sm-5 d-block d-sm-none">
                <a href="/" class="text-white opacity-75">Kembali</a>
            </div>
        </div>
        <div class="text-center illus-login">
            <img src="{{ asset('images/illust.png') }}" alt="logo" width="60%" />
        </div>
    </div> --}}

    <div class="row d-flex justify-content-center">
        {{-- col-12 col-sm-7 pt-3 --}}
        <div class="col-12 col-sm-9 px-5">

            <h1 class="w-100 fw-bold text-center mt-5 mt-sm-0 mb-0 p-0 pt-sm-5 fs-3">MASUK</h1>

            {{-- @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible show fade">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif --}}

            <div class="card mt-5 p-sm-4 p-2 mb-0 border-start-0 border-end-0 margin-form">
                <div class="card-body">
                    <form action="/login" method="post" class="">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control p-2 mt-1 @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}" />
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="password" class="form-label">Password</label>
                            <div class="d-flex flex-row-reverse align-items-center">
                                <input type="password" class="form-control p-2 mt-1 @error('password') is-invalid @enderror"
                                    id="password" name="password" aria-describedby="show-btn" />
                                <button type="button" class="btn bg-transparent position-absolute start-auto"
                                    id="show-btn" data-bs-toggle="tooltip"
                                    data-bs-title="Tampilkan / Sembunyikan password">
                                    <i class="bi bi-eye-slash-fill"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="text-end mt-3">
                                <a href="# " class="form-text">Lupa password?</a>
                            </div>

                        </div>
                        <div class="text-start mt-5 mb-2">
                            <button type="submit" class="w-100  btn btn-primary text-white p-2">Masuk</button>
                        </div>
                    </form>
                    <small class="card-subtitle text-muted">
                        Belum punya akun?
                        <a href="/register">Daftar sekarang</a>
                    </small>
                </div>
            </div>
            {{-- <div class="d-flex justify-content-center">
                @include('auth.layouts.footer')
            </div> --}}
        </div>
    </div>
@endsection
@section('scripts')
    @vite('resources/js/display-password/login.js')
@endsection()
