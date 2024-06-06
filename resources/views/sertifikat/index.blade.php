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
        <div class="card-body pt-0">
            <table class="table align-middle m-2 border">
                <thead>
                    <tr class="bg-success text-white">
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sertifikat as $sertifikat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sertifikat->user->vendorDetail->nama_perusahaan }}</td>
                            <td>{{ \Carbon\Carbon::parse($sertifikat->created_at)->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ URL::asset('storage/' . $sertifikat->certificate_path) }}"
                                    class="btn btn-primary"
                                    download="Sertifikat CSMS {{ $sertifikat->user->vendorDetail->nama_perusahaan }}.pdf">Download</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Belum ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
