@extends('layouts.app')
@section('page-title')
    <div class="page-title d-flex flex-column  flex-wrap me-3  border border-success rounded-pill  ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 rounded-pill ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                <li class="ml-auto">{{ \Carbon\Carbon::now()->format('D, d F Y') }}</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="card card-docs flex-row-fluid mt-4 border border-success " style="border-radius: 3rem;">
        <div class="card-body p-9 ">
            <a href="{{ route('vendor') }}" class="btn btn-danger"><i class="bi bi-arrow-left-circle"></i></a>
            <form action="{{ route('storePerusahaan') }}" method="post">
                @csrf
                <div class="mb-2">
                    <label class="col-form-label fw-semibold fs-6">Profile Detail</label>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="col-form-label required fw-semibold fs-6">NPWP</label>
                            <div class="col-lg-10 fv-row">
                                <input type="text" name="npwp" class="form-control form-control-solid"
                                    placeholder="NPWP" value="{{ $vendor->npwp ?? '' }}" readonly />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label required fw-semibold fs-6">Nama Perusahaan</label>
                            <div class="col-lg-10 fv-row">
                                <input type="text" name="nama_perusahaan" class="form-control form-control-solid"
                                    placeholder="Nama Perusahaan" value="{{ $vendor->nama_perusahaan ?? '' }}" readonly />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label required fw-semibold fs-6">Email</label>
                            <div class="col-lg-10 fv-row">
                                <input type="email" name="email" class="form-control form-control-solid"
                                    placeholder="Email name" value="{{ $vendor->email ?? '' }}" readonly />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label required fw-semibold fs-6">Mobile Phone</label>
                            <div class="col-lg-10 fv-row">
                                <input type="number" name="phone" class="form-control form-control-solid"
                                    placeholder="mobile phone" value="{{ $vendor->phone ?? '' }}" readonly />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label required fw-semibold fs-6">No. NIB</label>
                            <div class="col-lg-10 fv-row">
                                <input type="number" name="no_tdp" class="form-control form-control-solid"
                                    placeholder="No NIB" value="{{ $vendor->no_tdp ?? '' }}" readonly />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label required fw-semibold fs-6">No. SIUP</label>
                            <div class="col-lg-10 fv-row">
                                <input type="number" name="no_siup" class="form-control form-control-solid"
                                    placeholder="No SIUP" value="{{ $vendor->no_siup ?? '' }}" readonly />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label required fw-semibold fs-6">No. PKP</label>
                            <div class="col-lg-10 fv-row">
                                <input type="number" name="no_pkp" class="form-control form-control-solid"
                                    placeholder="No PKP" value="{{ $vendor->no_pkp ?? '' }}" readonly />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label required fw-semibold fs-6">Website</label>
                            <div class="col-lg-10 fv-row">
                                <input type="text" name="website" class="form-control form-control-solid"
                                    placeholder="Website" value="{{ $vendor->website ?? '' }}" readonly />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3"readonly>{{ $vendor->alamat ?? '' }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="col-form-label required fw-semibold fs-6">No. Akta Pendirian</label>
                            <div class="col-lg-10 fv-row">
                                <input type="number" name="no_akta" class="form-control form-control-solid"
                                    placeholder="No Akta Pendirian" value="{{ $vendor->no_akta ?? '' }}" readonly />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label required fw-semibold fs-6">Nama Direktur</label>
                            <div class="col-lg-10 fv-row">
                                <input type="text" name="direktur" class="form-control form-control-solid"
                                    placeholder="Nama Direktur" value="{{ $vendor->direktur ?? '' }}" readonly />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label required fw-semibold fs-6">No. Telepon Direktur</label>
                            <div class="col-lg-10 fv-row">
                                <input type="number" name="direktur_phone" class="form-control form-control-solid"
                                    placeholder="No. Telepon Direktur" value="{{ $vendor->direktur_phone ?? '' }}"
                                    readonly />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label required fw-semibold fs-6">Email Direktur</label>
                            <div class="col-lg-10 fv-row">
                                <input type="email" name="direktur_email" class="form-control form-control-solid"
                                    placeholder="Email Direktur" value="{{ $vendor->direktur_email ?? '' }}" readonly />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label required fw-semibold fs-6">Kode Pos</label>
                            <div class="col-lg-10 fv-row">
                                <input type="number" name="kode_pos" class="form-control form-control-solid"
                                    placeholder="Kode Pos" value="{{ $vendor->kode_pos ?? '' }}" readonly />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label required fw-semibold fs-6">Provinsi</label>
                            <div class="col-lg-10 fv-row">
                                <input type="text" name="provinsi" class="form-control form-control-solid"
                                    placeholder="Provinsi" value="{{ $vendor->provinsi ?? '' }}" readonly />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label required fw-semibold fs-6">Kota</label>
                            <div class="col-lg-10 fv-row">
                                <input type="text" name="kota" class="form-control form-control-solid"
                                    placeholder="Kota" value="{{ $vendor->kota ?? '' }}" readonly />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label required fw-semibold fs-6">Titik Koordinat</label>
                            <div class="col-lg-10 fv-row">
                                <input type="text" name="titik_koordinat" class="form-control form-control-solid"
                                    placeholder="Titik Koordinat" value="{{ $vendor->titik_koordinat ?? '' }}"
                                    readonly />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
