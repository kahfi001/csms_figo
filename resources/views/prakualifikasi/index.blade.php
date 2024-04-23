@extends('layouts.app')
{{-- @section('page-title')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">
            Dashboard >
        </h1>
    </div>
@endsection --}}
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
<div class="card card-docs flex-row-fluid mt-5">
    <div class="card-header d-flex justify-content-between">
        <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
            <input type="search" name="search" class="form-control form-control-solid w-250px ps-15" id="search" placeholder="Cari.." />
        </div>
        <div class="d-flex flex-stack">
            <button type="button" class="btn btn-primary ms-2" data-toggle="modal" data-target="#StatusModal">Simpan</button>
        </div>
    </div>
    <div class="card-body pt-0">
        <table id="alumni-table" class="table align-middle table-row-dashed fs-6 gy-5 alumni-tables">
            <thead>
                <tr class="fw-semibold fs-6 text-muted">
                    <th class="text-start min-w-100px">No</th>
                    <th class="text-start min-w-70px">Nama Alumni</th>
                    <th class="text-start min-w-100px">Tahun Lulus</th>
                    <th class="text-start min-w-100px">Status</th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
            </tbody>
        </table>
    </div>
</div>

@endsection