@extends('layouts.app')
@section('page-title')
    <div class="page-title d-flex flex-column  flex-wrap me-3  border border-success rounded-pill  ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 rounded-pill ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active text-bold" aria-current="page">Berita Acara</li>
                <li class="ml-auto">{{ \Carbon\Carbon::now()->format('D, d F Y') }}</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="card card-docs flex-row-fluid mt-5 p-3 border-success" style="border-radius: 1.35rem">
        <div class="card-header d-flex justify-content-between">
            <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
                <input type="search" name="search" class="form-control form-control-solid w-250px ps-15" id="search"
                    placeholder="Cari.." />
            </div>
        </div>
        <div class="card-body pt-0">

            <div class="table-responsive">
                <table id="verifikasi-table " class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Tanggal pendaftaran</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @forelse ($berita as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->vendorDetail->nama_perusahaan }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                <td>
                                    @if ($item->is_upload_vendor == 0)
                                        Menunggu tanda tangan direktur
                                    @elseif($item->is_upload_vendor == 1 && $item->is_upload_manager == 0)
                                        Menunggu tanda tangan manager
                                    @elseif($item->is_upload_manager == 1)
                                        Disetujui
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ URL::asset('storage/' . $item->document_path) }}" class="btn btn-success"
                                        download="Berita acara">Download</a>
                                    @if ($item->is_upload_vendor == false)
                                        <a href="{{ url('berita/' . $item->id) }}" class="btn btn-primary">Upload</a>
                                    @endif
                                    @if (auth()->user()->role == 'manager')
                                        @if ($item->is_upload_manager == false)
                                            <a href="{{ url('berita/' . $item->id) }}" class="btn btn-primary">Upload</a>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
