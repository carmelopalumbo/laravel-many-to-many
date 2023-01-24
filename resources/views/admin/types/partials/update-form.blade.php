<form action="{{ route('admin.types.update', $type) }}" method="POST">
    @csrf
    @method('PUT')
    <td>
        <input name="name" class="border-0" type="text" value="{{ $type->name }}">
    </td>
    <td>
        <button class="btn btn-warning" type="submit">
            <i class="fa-regular fa-pen-to-square"></i>
        </button>
    </td>
</form>
