<div class="action-btn-container">
    <a href="{{ route('kategori.edit', $kategori->kategori_id) }}" class="btn btn-sm btn-warning" data-toggle="tooltip"
        title="Edit Kategori">
        <i class="fas fa-edit"></i>
    </a>

    <form action="{{ route('kategori.destroy', $kategori->kategori_id) }}" method="POST" class="d-inline delete-form">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-sm btn-danger delete-btn" data-toggle="tooltip" title="Hapus Kategori">
            <i class="fas fa-trash"></i>
        </button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof deleteHandlersInitialized === 'undefined') {
            // Add event listener for delete buttons using event delegation
            document.addEventListener('click', function(e) {
                const deleteBtn = e.target.closest('.delete-btn');
                if (deleteBtn) {
                    e.preventDefault();
                    const form = deleteBtn.closest('.delete-form');

                    Swal.fire({
                        title: 'Konfirmasi Hapus',
                        text: 'Apakah Anda yakin ingin menghapus kategori ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                }
            });

            // Set a flag to ensure this is only initialized once
            window.deleteHandlersInitialized = true;

            console.log('Delete handlers initialized');
        }
    });
</script>
