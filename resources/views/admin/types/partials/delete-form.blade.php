<form onsubmit="return confirm('Confermi l\'eliminazione di {{ $type->name }} ?')" method="POST"
    action="{{ route('admin.types.destroy', $type) }}">
    @csrf
    @method('DELETE')
    <td>
        <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
    </td>
</form>
