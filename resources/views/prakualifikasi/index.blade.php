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
                <li class="breadcrumb-item active text-bold" aria-current="page">Prakualifikasi</li>
                <li class="ml-auto">{{ \Carbon\Carbon::now()->format('D, d F Y') }}</li>
            </ol>
        </nav>
    </div>
    @endsection
@section('content')
<div class="card card-docs flex-row-fluid mt-5 p-3 border-success" style="border-radius: 1.35rem">
    <table class="table align-middle m-2 border">
        <tr>
            <td>Pilih Tidak</td>
            <td>Tidak perlu melampirkan dokumen</td>
        </tr>
        <tr>
            <td>Pilih Ya</td>
        </tr>
        <tr>
            <td>Pilih N/a</td>
            <td>Tidak perlu lampirkan dokumen</td>
        </tr>
    </table>
    <div class="card-header d-flex justify-content-between">
        <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
            <input type="search" name="search" class="form-control form-control-solid w-250px ps-15" id="search" placeholder="Cari.." />
        </div>
        <div class="d-flex flex-stack">
            <button type="button" class="btn btn-primary ms-2" data-toggle="modal" data-target="#StatusModal">Simpan</button>
        </div>
    </div>
    <div class="card-body pt-0">
        <table id="prakualifikasi-table" class="table align-middle table-row-dashed fs-6 gy-5 prakualifikasi-tables">
            <thead>
                <tr class="fw-semibold fs-6 text-muted">
                    <th class="text-start">No</th>
                    <th class="text-center" colspan="5">Prakualifikasi</th>
                </tr>
            </thead>
            <thead>
                <tr class="fw-semibold fs-6 text-muted">
                    <th class="text-start" style="width:10%;">1</th>
                    <th class="text-start">Kebijakan</th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                <tr>
                    <td>1.1</td>
                    <td>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque esse est quasi.</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineradio1" value="option1">
                            <label class="form-check-label" for="inlineradio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineradio2" value="option2">
                            <label class="form-check-label" for="inlineradio2">Tidak</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineradio3" value="option3" >
                            <label class="form-check-label" for="inlineradio3">N/a</label>
                        </div>
                        <div class="upload-btn-wrapper" style="position: relative;overflow: hidden;">
                            <button class="btn btn-outline-success mt-2 hover"> + Tambah Lampiran</button>
                            <input type="file" name="myfile" style=" font-size: 100px; position: absolute; left: 0; top: 0;opacity: 0;"/>
                          </div>
                    </td>
                </tr>
                <tr>
                    <td>1.1</td>
                    <td>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque esse est quasi.</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineradio1" value="option1">
                            <label class="form-check-label" for="inlineradio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineradio2" value="option2">
                            <label class="form-check-label" for="inlineradio2">Tidak</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineradio3" value="option3" >
                            <label class="form-check-label" for="inlineradio3">N/a</label>
                        </div>
                        <div class="upload-btn-wrapper" style="position: relative;overflow: hidden;">
                            <button class="btn btn-outline-success mt-2 hover"> + Tambah Lampiran</button>
                            <input type="file" name="myfile" style=" font-size: 100px; position: absolute; left: 0; top: 0;opacity: 0;"/>
                          </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
