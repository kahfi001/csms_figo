@extends('layouts.app')
@section('title', 'Profile Details')
@section('content')
    <div class="card mt-11">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Account</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form id="kt_account_profile_details_form" method="POST" enctype="multipart/form-data"
                action="{{ route('update-user', auth()->user()->id) }}" class="form">
                @csrf
                @method('PUT')
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Lengkap</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" value="{{ auth()->user()->name }}" name="name"
                                class="form-control form-control-lg form-control-solid" placeholder="Company name" />
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email</label>
                        <div class="col-lg-8 fv-row">
                            <input readonly type="email" value="{{ auth()->user()->email }}" name="email"
                                class="form-control form-control-lg form-control-solid" placeholder="Email name" />
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between  py-6 px-9">
                        <a href="{{ route('password.change') }}" class="btn btn-warning">Change Password</a>
                        <div>
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                                Changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
