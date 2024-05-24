@if ($prequalification->is_accepted == 1)
    <span class="badge badge-pill badge-primary py-2 px-4">Sudah Divalidasi</span>
@else
    <span class="badge badge-pill badge-warning py-2 px-4">Belum Divalidasi</span>
@endif
