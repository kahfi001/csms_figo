<x-app-layout >
    @section('content')
        <div class="row align-item-center h-100" >
            <div class="col-xl-3">
                <a href="{{ route('profile.edit') }}">
                    <div class="card  border-success hoverable card-xl-stretch mb-xl-8">
                        <div class="card-header bg-white align-self-center">
                            <i class="fa fa-light fa-address-card" style="font-size: 5rem; color:#999999"></i>
                        </div>
                    </div>
                    <div class="text-gray-700 text-center fw-semibold fs-6 me-2">Profile</div>
                </a>
            </div>
            <div class="col-xl-3">
                <a href="{{ route('prakualifikasi') }}">
                    <div class="card  border-success hoverable card-xl-stretch mb-xl-8">
                        <div class="card-header bg-white align-self-center">
                            <i class="fa fa-light fa-list" style="font-size: 5rem; color:#999999"></i>
                        </div>
                    </div>
                    <div class="text-gray-700 text-center fw-semibold fs-6 me-2">Prakualifikasi</div>
                </a>
            </div>
            <div class="col-xl-3">
                <a href="{{ route('sertifikat') }}">
                    <div class="card  border-success hoverable card-xl-stretch mb-xl-8">
                        <div class="card-header bg-white align-self-center">
                            <i class="fa fa-light fa-certificate" style="font-size: 5rem; color:#999999"></i>
                        </div>
                    </div>
                    <div class="text-gray-700 text-center fw-semibold fs-6 me-2">Sertifikat</div>
                </a>
            </div>
            <div class="col-xl-3">
                <a href="{{ route('profile.edit') }}">
                    <div class="card  border-success hoverable card-xl-stretch mb-xl-8">
                        <div class="card-header bg-white align-self-center">
                            <i class="fa fa-light fa-user" style="font-size: 5rem; color:#999999"></i>
                        </div>
                    </div>
                    <div class="text-gray-700 text-center fw-semibold fs-6 me-2">Account</div>
                </a>
            </div>
        </div>
    @endsection
</x-app-layout>
