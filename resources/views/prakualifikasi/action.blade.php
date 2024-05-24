<div class="row g-3">
    @if ($prequalification->status = 0)
        <a href="{{ route('detail-prakualifikasi', $prequalification->id) }}" class="btn btn-info">
            <i class="bi bi-eye"></i>
        </a>
    @endif
</div>
