@extends('layouts.app')

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
    @if (auth()->user()->role == 'vendor')
        <div class="card card-docs flex-row-fluid mt-5 p-3 border-success" style="border-radius: 1.35rem">
            @if (count($category) > 0)
                <table class="table align-middle m-2 border">
                    <tr>
                        <td>Pilih Tidak</td>
                        <td>Tidak perlu melampirkan dokumen</td>
                    </tr>
                    <tr>
                        <td colspan="2">Pilih Ya</td>
                    </tr>
                    <tr>
                        <td>Pilih N/a</td>
                        <td>Tidak perlu lampirkan dokumen</td>
                    </tr>
                </table>
                <div class="card-body pt-0">
                    <table id="prakualifikasi-table" class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                            <tr class="fw-semibold fs-6 text-muted">
                                <th class="text-start">No</th>
                                <th class="text-center">Prakualifikasi</th>
                            </tr>
                        </thead>
                        <form action="{{ route('store-prakualifikasi') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($category as $keyCategory => $category)
                                    @php
                                        $keyCategory++;
                                    @endphp
                                    <tr class="fw-semibold fs-6 text-white bg-success">
                                        <td class="text-start" style="width:10%;">{{ $keyCategory }}</td>
                                        <td class="text-start">{{ $category->name }}</td>
                                    </tr>
                                    @foreach ($category->criteria as $key => $criteria)
                                        @php
                                            $key++;
                                        @endphp
                                        <tr>
                                            <td>{{ $keyCategory . '.' . $key }}</td>
                                            <td>
                                                <p>{{ $criteria->name }}</p>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        id="inlineradio1_{{ $criteria->id }}"
                                                        name="responses[{{ $criteria->id }}][response]" value="ya">
                                                    <label class="form-check-label"
                                                        for="inlineradio1_{{ $criteria->id }}">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        id="inlineradio2_{{ $criteria->id }}"
                                                        name="responses[{{ $criteria->id }}][response]" value="tidak">
                                                    <label class="form-check-label"
                                                        for="inlineradio2_{{ $criteria->id }}">Tidak</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        id="inlineradio3_{{ $criteria->id }}"
                                                        name="responses[{{ $criteria->id }}][response]" value="na">
                                                    <label class="form-check-label"
                                                        for="inlineradio3_{{ $criteria->id }}">N/a</label>
                                                </div>
                                                <div class="form-check p-0">
                                                    <textarea class="form-control w-50" placeholder="keterangan" name="responses[{{ $criteria->id }}][description]"
                                                        id="" rows="1"></textarea>
                                                </div>
                                                <div class="upload-btn-wrapper"
                                                    style="position: relative; overflow: hidden;">
                                                    <button class="btn btn-outline-success mt-2 hover"> + Tambah
                                                        Lampiran</button>
                                                    <input type="file" name="responses[{{ $criteria->id }}][attachment]"
                                                        style="font-size: 100px; position: absolute; left: 0; top: 0; opacity: 0;">
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td style="text-align: right;"><button type="submit" class="btn btn-primary"
                                            aria-colspan="">Simpan</button></td>
                                </tr>
                            </tfoot>
                        </form>

                    </table>
                </div>
            @else
                <h5 class="text-center">Prakualifikasi Belum dibuka!</h5>
            @endif
        </div>
    @else
        <div class="card card-docs flex-row-fluid mt-5 p-3 border-success" style="border-radius: 1.35rem">
            <div class="card-header d-flex justify-content-between">
                <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
                    {{-- <input type="search" name="search" class="form-control form-control-solid w-250px ps-15"
                        id="search" placeholder="Cari.." /> --}}
                    <a href="{{ route('soal-prakualifikasi') }}" class="btn btn-secondary">Soal Prakualifikasi</a>
                </div>
            </div>
            <div class="card-body pt-0">

                <table id="verifikasi-table" class="table align-middle table-row-dashed fs-6 gy-5 w-100">
                    <thead>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Tanggal pendaftaran</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </thead>
                </table>
            </div>
        </div>
    @endif
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#verifikasi-table').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                stateSave: false,
                ajax: "{{ url('prakualifikasi') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'user.vendordetail.nama_perusahaan',
                        name: 'user.vendordetail.nama_perusahaan'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data, type, row) {
                            var date = new Date(data);
                            return new Intl.DateTimeFormat('id-ID', {
                                day: '2-digit',
                                month: 'long',
                                year: 'numeric'
                            }).format(date);
                        }
                    },
                    {
                        data: 'is_accepted',
                        name: 'is_accepted'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '15%'
                    },
                ]
            });
        });
    </script>
@endpush
