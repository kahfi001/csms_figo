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
                <li class="ml-auto">{{ \Carbon\Carbon::now()->format('D d F Y') }}</li>
            </ol>
        </nav>
    </div>
    @endsection
@section('content')


@endsection
