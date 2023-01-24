<form onsubmit="return confirm('Confermi l\'eliminazione di {{ $technology->name }} ?')" method="POST"
    action="{{ route('admin.technologies.destroy', $technology) }}">
    @csrf
    @method('DELETE')
    <td>
        <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
    </td>
</form>
