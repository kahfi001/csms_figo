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

<div class="card card-docs flex-row-fluid mt-5 p-3 border-success" style="border-radius: 1.35rem">
    <div class="card-header d-flex justify-content-between">
        <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
            <input type="search" name="search" class="form-control form-control-solid w-250px ps-15" id="search" placeholder="Cari.." />
        </div>
    </div>
    <div class="card-body pt-0">

        <table id="verifikasi-table " class="table align-middle table-row-dashed fs-6 gy-5">
            <thead> 
                <th>No</th>
                <th>Nama Perusahaan</th>
                <th>Tanggal pendaftaran</th>
                <th>Status</th>
                <th>Actions</th>
                <th>Download</th>
                <th><a href="{{ route('berita-acara.print') }}" id="">Download PDF</a></th>
            </thead>
        </table>
    </div>
</div>

@endsection
@push('scripts')
    <script>
        $(document).ready( function () {
            $('#verifikasi-table').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                stateSave: false,  
                ajax: "{{ url('berita-acara') }}",
                columns: [  
                            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                            { data: 'name', name: 'name' },
                            { data: 'created_at', name: 'created_at' },
                            { data: 'status', name: 'status' },
                        ]
            });
        });
    </script>
    <script>
        document.getElementById("downloadPdf").addEventListener("click", function() {
            var pdf = new jsPDF();
            pdf.text(20, 20, "Contoh Halaman HTML yang Dikonversi menjadi PDF");
            pdf.text(20, 30, "Ini adalah contoh teks. Anda dapat menambahkan lebih banyak elemen HTML di sini.");
            pdf.save("halaman_pdf.pdf");
        });
    </script>        
@endpush
