@extends('layouts.app')
@section('page-title')
    <div class="page-title d-flex flex-column  flex-wrap me-3  border border-success rounded-pill  ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 rounded-pill ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active text-bold" aria-current="page">User</li>
                <li class="ml-auto">{{ \Carbon\Carbon::now()->format('D, d F Y') }}</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="card card-docs flex-row-fluid mt-5 p-3 border-success" style="border-radius: 1.35rem">
        <div class="card-body pt-0">
            <h5 class="fw-bold mb-3">Tambahkan User</h5>
            <form action="{{ route('store-user') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nama Lengkap"
                        required />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                        required />
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="custom-select " name="role" id="role">
                        <option selected>Pilih Role</option>
                        <option value="admin">ADMIN</option>
                        <option value="procurement">PROCUREMENT</option>
                        <option value="hse">HSE</option>
                        <option value="manager">MANAGER</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
