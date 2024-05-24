@extends('layouts.app')

@section('page-title')
    <div class="page-title d-flex flex-column  flex-wrap me-3  border border-success rounded-pill  ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 rounded-pill ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active text-bold" aria-current="page">Soal Prakualifikasi</li>
                <li class="ml-auto">{{ \Carbon\Carbon::now()->format('D, d F Y') }}</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="card card-docs flex-row-fluid mt-5 p-3 border-success" style="border-radius: 1.35rem">
        <div class="card-header d-flex justify-content-between">
            <div class="d-flex flex-stack">
                {{-- <button type="button" class="btn btn-primary ms-2" data-toggle="modal" data-target="#StatusModal">Simpan</button> --}}
                <button type="button" class="btn btn-success" href="#" data-toggle="modal"
                    data-target="#kategoriModal">
                    + Kategori
                </button>
                <button type="button" class="btn btn-success mx-2" href="#" data-toggle="modal"
                    data-target="#kriteriaModal">
                    + Kriteria
                </button>
            </div>
        </div>
        <div class="card-body pt-0">
            <table id="prakualifikasi-table" class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th class="text-start">No</th>
                        <th class="text-center">Prakualifikasi</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    @foreach ($category as $categoryKey => $category)
                        @php
                            $categoryKey++;
                        @endphp
                        <tr class="fw-semibold fs-6 text-white bg-success">
                            <td colspan="2">{{ $categoryKey . '. ' . $category->name }}</td>
                            <td class="text-right">
                                <form action="{{ route('delete-kategori', $category->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" data-toggle="tooltip" data-original-title="Hapus"
                                        onclick="return confirm('Apakah anda yakin?')">
                                        <i class="bi bi-trash3"></i> Kategori
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @foreach ($category->criteria as $key => $criteria)
                            @php
                                $key++;
                            @endphp
                            <tr>
                                <td></td>
                                <td>{{ $categoryKey . '.' . $key . '. ' . $criteria->name }}</td>
                                <td class="text-right">
                                    <form action="{{ route('delete-kriteria', $criteria->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" data-toggle="tooltip" data-original-title="Hapus"
                                            onclick="return confirm('Apakah anda yakin?')">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="kategoriModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kategori</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('store-kategori') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label for="kategori">Kategori</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="kriteriaModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kriteria</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('store-kriteria') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-xl-3">
                                <label for="kriteria" class="form-label">Kategori</label>
                            </div>
                            <div class="col-lg">
                                <select name="category_id" id="kriteria" class="form-control" data-control="select"
                                    data-placeholder="Pilih Kategori">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categorySelect as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-xl-3">
                                <label for="kriteria" class="form-label">Kriteria</label>
                            </div>
                            <div class="col-lg">
                                <input type="text" name="name" id="kriteria" class="form-control">
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" href="#">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
