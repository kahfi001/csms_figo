<x-app-layout>
    @section('content')
        <div class="row d-flex justify-content-evenly">
            <div class="col-xl-3 mb-1">
                <a href="#">
                    <div class="card bg-body border-success hoverable card-xl-stretch mb-xl-8">
                        <div class="card-header align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><style>svg{fill:#999999}</style><path d="M4.1 38.2C1.4 34.2 0 29.4 0 24.6C0 11 11 0 24.6 0H133.9c11.2 0 21.7 5.9 27.4 15.5l68.5 114.1c-48.2 6.1-91.3 28.6-123.4 61.9L4.1 38.2zm503.7 0L405.6 191.5c-32.1-33.3-75.2-55.8-123.4-61.9L350.7 15.5C356.5 5.9 366.9 0 378.1 0H487.4C501 0 512 11 512 24.6c0 4.8-1.4 9.6-4.1 13.6zM80 336a176 176 0 1 1 352 0A176 176 0 1 1 80 336zm184.4-94.9c-3.4-7-13.3-7-16.8 0l-22.4 45.4c-1.4 2.8-4 4.7-7 5.1L168 298.9c-7.7 1.1-10.7 10.5-5.2 16l36.3 35.4c2.2 2.2 3.2 5.2 2.7 8.3l-8.6 49.9c-1.3 7.6 6.7 13.5 13.6 9.9l44.8-23.6c2.7-1.4 6-1.4 8.7 0l44.8 23.6c6.9 3.6 14.9-2.2 13.6-9.9l-8.6-49.9c-.5-3 .5-6.1 2.7-8.3l36.3-35.4c5.6-5.4 2.5-14.8-5.2-16l-50.1-7.3c-3-.4-5.7-2.4-7-5.1l-22.4-45.4z"/></svg>
                        </div>
                        
                        {{-- <div class="card-body pt-5">
                                <div class="d-flex flex-stack">
                                    <div class="d-flex align-items-senter">
                                        <span class="text-gray-900 fw-bolder fs-6">X<span>
                                    </div>
                                </div>
                        </div> --}}
                    </div>
                    <div class="text-gray-700 text-center fw-semibold fs-6 me-2">Prestasi</div>
                </a>
            </div>
            <div class="col-xl-3 mb-1">
                <a href="#">
                    <div class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <div class="card-header align-content-center pt-5">
                            <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><style>svg{fill:#999999}</style><path d="M4.1 38.2C1.4 34.2 0 29.4 0 24.6C0 11 11 0 24.6 0H133.9c11.2 0 21.7 5.9 27.4 15.5l68.5 114.1c-48.2 6.1-91.3 28.6-123.4 61.9L4.1 38.2zm503.7 0L405.6 191.5c-32.1-33.3-75.2-55.8-123.4-61.9L350.7 15.5C356.5 5.9 366.9 0 378.1 0H487.4C501 0 512 11 512 24.6c0 4.8-1.4 9.6-4.1 13.6zM80 336a176 176 0 1 1 352 0A176 176 0 1 1 80 336zm184.4-94.9c-3.4-7-13.3-7-16.8 0l-22.4 45.4c-1.4 2.8-4 4.7-7 5.1L168 298.9c-7.7 1.1-10.7 10.5-5.2 16l36.3 35.4c2.2 2.2 3.2 5.2 2.7 8.3l-8.6 49.9c-1.3 7.6 6.7 13.5 13.6 9.9l44.8-23.6c2.7-1.4 6-1.4 8.7 0l44.8 23.6c6.9 3.6 14.9-2.2 13.6-9.9l-8.6-49.9c-.5-3 .5-6.1 2.7-8.3l36.3-35.4c5.6-5.4 2.5-14.8-5.2-16l-50.1-7.3c-3-.4-5.7-2.4-7-5.1l-22.4-45.4z"/></svg>
                            <h3 class="card-title text-gray-800">Prestasi</h3>
                            <div>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                                <div class="d-flex flex-stack">
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Prestasi</div>
                                    <div class="d-flex align-items-senter">
                                        <span class="text-gray-900 fw-bolder fs-6">X<span>
                                    </div>
                                </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 mb-1">
                <a href="#">
                    <div class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <div class="card-header align-content-center pt-5">
                            <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><style>svg{fill:#999999}</style><path d="M160 96a96 96 0 1 1 192 0A96 96 0 1 1 160 96zm80 152V512l-48.4-24.2c-20.9-10.4-43.5-17-66.8-19.3l-96-9.6C12.5 457.2 0 443.5 0 427V224c0-17.7 14.3-32 32-32H62.3c63.6 0 125.6 19.6 177.7 56zm32 264V248c52.1-36.4 114.1-56 177.7-56H480c17.7 0 32 14.3 32 32V427c0 16.4-12.5 30.2-28.8 31.8l-96 9.6c-23.2 2.3-45.9 8.9-66.8 19.3L272 512z"/></svg>
                            <h3 class="card-title text-gray-800">MBKM</h3>
                            <div>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                                <div class="d-flex flex-stack">
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">MBKM</div>
                                    <div class="d-flex align-items-senter">
                                        <span class="text-gray-900 fw-bolder fs-6">X<span>
                                    </div>
                                </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 mb-1">
                <a href="#">
                    <div class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <div class="card-header align-content-center pt-5">
                            <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><style>svg{fill:#999999}</style><path d="M160 96a96 96 0 1 1 192 0A96 96 0 1 1 160 96zm80 152V512l-48.4-24.2c-20.9-10.4-43.5-17-66.8-19.3l-96-9.6C12.5 457.2 0 443.5 0 427V224c0-17.7 14.3-32 32-32H62.3c63.6 0 125.6 19.6 177.7 56zm32 264V248c52.1-36.4 114.1-56 177.7-56H480c17.7 0 32 14.3 32 32V427c0 16.4-12.5 30.2-28.8 31.8l-96 9.6c-23.2 2.3-45.9 8.9-66.8 19.3L272 512z"/></svg>
                            <h3 class="card-title text-gray-800">MBKM</h3>
                            <div>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                                <div class="d-flex flex-stack">
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">MBKM</div>
                                    <div class="d-flex align-items-senter">
                                        <span class="text-gray-900 fw-bolder fs-6">X<span>
                                    </div>
                                </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endsection
</x-app-layout>
