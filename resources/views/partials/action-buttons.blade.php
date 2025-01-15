<a href="{{ $editUrl }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ $deleteUrl }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">Hapus</button>
</form>
