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
        <div class="table-responsive">
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
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table id="prakualifikasi-table" class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        <tr class="fw-semibold fs-6 text-muted">
                            <th class="text-start">No</th>
                            <th class="text-center">Prakualifikasi</th>
                        </tr>
                    </thead>
                    <form action="{{ route('store-score') }}" method="post">
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
                                @foreach ($category->subCategory as $keySubCategory => $subCategory)
                                    @php
                                        $keySubCategory++;
                                    @endphp
                                    <tr>
                                        <td style="padding-left: 3rem">{{ $keyCategory . '.' . $keySubCategory . '.' }}</td>
                                        <td>{{ $subCategory->name }}</td>
                                    </tr>
                                    @foreach ($subCategory->criterias as $key => $criteria)
                                        @php
                                            $key++;
                                            $userResponse = $response->firstWhere('criteria_id', $criteria->id);
                                        @endphp
                                        <tr>
                                            <td style="padding-left: 5rem">
                                                {{ $keyCategory . '.' . $keySubCategory . '.' . $key }}</td>
                                            <td>
                                                <p>{{ $criteria->name }}</p>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                id="inlineradio1_{{ $criteria->id }}"
                                                                name="responses[{{ $criteria->id }}][response]"
                                                                value="ya"
                                                                {{ $userResponse && $userResponse->response == 'ya' ? 'checked' : '' }}
                                                                disabled>
                                                            <label class="form-check-label"
                                                                for="inlineradio1_{{ $criteria->id }}">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                id="inlineradio2_{{ $criteria->id }}"
                                                                name="responses[{{ $criteria->id }}][response]"
                                                                value="tidak"
                                                                {{ $userResponse && $userResponse->response == 'tidak' ? 'checked' : '' }}
                                                                disabled>
                                                            <label class="form-check-label"
                                                                for="inlineradio2_{{ $criteria->id }}">Tidak</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                id="inlineradio3_{{ $criteria->id }}"
                                                                name="responses[{{ $criteria->id }}][response]"
                                                                value="na"
                                                                {{ $userResponse && $userResponse->response == 'na' ? 'checked' : '' }}
                                                                disabled>
                                                            <label class="form-check-label"
                                                                for="inlineradio3_{{ $criteria->id }}">N/a</label>
                                                        </div>
                                                        <div class="form-check p-0 mb-3">
                                                            <textarea class="form-control w-50" name="responses[{{ $criteria->id }}][description]" id="" rows="1"
                                                                disabled>{{ $userResponse->description }}</textarea>
                                                        </div>
                                                        <div class="upload-btn-wrapper"
                                                            style="position: relative; overflow: hidden;">
                                                            @if ($userResponse->attachment_path != '')
                                                                <a target="_blank"
                                                                    href="{{ URL::asset('/storage/' . $userResponse->attachment_path) }}"
                                                                    class="btn btn-primary">
                                                                    Lihat Dokumen
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @if ($userResponse->response != 'na')
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                @php
                                                                    $skor = 0;
                                                                    if ($userResponse->response == 'ya') {
                                                                        if ($userResponse->attachment_path != '') {
                                                                            $skor = 3;
                                                                        } else {
                                                                            $skor = 1;
                                                                        }
                                                                    } elseif ($userResponse->respons == 'tidak') {
                                                                        $skor = 0;
                                                                    }

                                                                @endphp
                                                                <label for="score" class="form-label">Skor</label>
                                                                <input type="number" class="form-control" name="scores[]"
                                                                    id="scores" value="{{ $skor }}"
                                                                    aria-describedby="helpId" placeholder="score"
                                                                    min="0" max="3"
                                                                    {{ $prequalification->is_accepted == 0 ? '' : 'disabled' }} />
                                                                <div id="error-message" class="text-danger"
                                                                    style="display: none">Score harus antara 0
                                                                    sampai 3.</div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <input type="hidden" name="total_score" id="total_score" value="0">
                                <input type="hidden" name="prequalification_id" id="prequalification_id"
                                    value="{{ $userResponse->prequalification_id }}">
                                @if ($prequalification->is_accepted == 0)
                                    <td style="text-align: right;"><button type="submit" class="btn btn-primary"
                                            aria-colspan="" id="submitButton">Simpan</button></td>
                                @endif
                            </tr>
                        </tfoot>
                    </form>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var scoreInput = document.getElementById("scores");
            var errorMessage = document.getElementById("error-message");
            var submitButton = document.getElementById("submitButton");


            scoreInput.addEventListener("input", function() {
                var value = parseFloat(scoreInput.value);
                if (value < 0 || value > 3) {
                    errorMessage.style.display = "block";
                    submitButton.disabled = true;
                } else {
                    errorMessage.style.display = "none";
                    submitButton.disabled = false;
                }
            });
        });
    </script>
@endpush
