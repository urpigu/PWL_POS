<div class="btn-group" role="group">
    <a href="{{ route('kategori.edit', $kategori->kategori_id) }}" class="btn btn-xs btn-warning" title="Edit">
        <i class="fas fa-edit"></i> Edit
    </a>

    <form action="{{ route('kategori.destroy', $kategori->kategori_id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-xs btn-danger"
            onclick="return confirm('Yakin ingin menghapus kategori ini?')" title="Delete">
            <i class="fas fa-trash"></i> Delete
        </button>
    </form>
</div>
