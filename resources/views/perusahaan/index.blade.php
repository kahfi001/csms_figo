@extends('layouts.app')
@section('page-title')
    <div class="page-title d-flex flex-column  flex-wrap me-3  border border-success rounded-pill  ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 rounded-pill ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                <li class="ml-auto">{{ \Carbon\Carbon::now()->format('D, d F Y') }}</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="card card-docs flex-row-fluid mt-4 border border-success " style="border-radius: 3rem;">
        <div class="card-body p-9 ">
            <form action="{{ route('storePerusahaan') }}" method="post">
                @csrf
                <div class="row mb-2">
                    <label class="col-lg-2 col-form-label fw-semibold fs-6">Profile</label>
                </div>
                <div class="row mb-2">
                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">NPWP</label>
                    <div class="col-lg-10 fv-row">
                        <input type="text" name="npwp" class="form-control form-control-solid" placeholder="NPWP"
                            value="{{ $vendor->npwp ?? '' }}" />
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Nama Perusahaan</label>
                    <div class="col-lg-10 fv-row">
                        <input type="text" name="nama_perusahaan" class="form-control form-control-solid"
                            placeholder="Nama Perusahaan" value="{{ $vendor->nama_perusahaan ?? '' }}" />
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Email</label>
                    <div class="col-lg-10 fv-row">
                        <input type="email" name="email" class="form-control form-control-solid"
                            placeholder="Email name" value="{{ $vendor->email ?? '' }}" />
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Mobile Phone</label>
                    <div class="col-lg-10 fv-row">
                        <input type="number" name="phone" class="form-control form-control-solid"
                            placeholder="mobile phone" value="{{ $vendor->phone ?? '' }}" />
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">No. TDP</label>
                    <div class="col-lg-10 fv-row">
                        <input type="number" name="no_tdp" class="form-control form-control-solid" placeholder="No TDP"
                            value="{{ $vendor->no_tdp ?? '' }}" />
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">No. SIUP</label>
                    <div class="col-lg-10 fv-row">
                        <input type="number" name="no_siup" class="form-control form-control-solid" placeholder="No SIUP"
                            value="{{ $vendor->no_siup ?? '' }}" />
                    </div>
                </div>
                <input type="hidden" name="id" value="{{ $vendor->id ?? '' }}">
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Batal</button>
                    <button type="submit" class="btn btn-primary" name="action" id="kt_account_profile_details_submit"
                        value="{{ $countVendor > 0 ? 'ubah' : 'simpan' }}">{{ $countVendor > 0 ? 'Ubah' : 'Simpan' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection