@extends('layouts.app')
@section('page-title')
    <div class="page-title d-flex flex-column  flex-wrap me-3  border border-success rounded-pill  ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 rounded-pill ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active text-bold" aria-current="page">Sertifikat</li>
                <li class="ml-auto">{{ \Carbon\Carbon::now()->format('D, d F Y') }}</li>
            </ol>
        </nav>
    </div>
    @endsection
@section('content')

<div class="card card-docs flex-row-fluid mt-5 p-3 border-success" style="border-radius: 1.35rem">
    <div class="card-header d-flex justify-content-between">
        <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
            <input type="search" name="search" class="form-control form-control-solid w-250px ps-15" id="search" placeholder="Cari.." />
        </div>
        <div class="d-flex flex-stack">
            <button type="button"  class="btn btn-primary ms-2" data-toggle="modal" data-target="#StatusModal"><a href="{{ route('sertifikat.print') }}">Download</a></button>
        </div>
    </div>
    <div class="card-body pt-0">
        <table class="table align-middle m-2 border">
            <thead>
                <tr class="bg-success text-white">
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

@endsection
