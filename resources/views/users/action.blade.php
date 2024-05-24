<div class="row g-3">
    <form action="{{ route('delete-user', $user->id) }}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-danger" data-toggle="tooltip" data-original-title="Hapus"
            onclick="return confirm('Apakah anda yakin?')">
            <i class="bi bi-trash3"></i>
        </button>
    </form>
</div>
