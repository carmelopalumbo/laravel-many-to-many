<form action="{{ route('admin.technologies.update', $technology) }}" method="POST">
    @csrf
    @method('PUT')
    <td>
        <input name="name" class="border-0 fst-italic" type="text" value="{{ $technology->name }}">
    </td>
    <td>
        <button class="btn btn-warning" type="submit">
            <i class="fa-regular fa-pen-to-square"></i>
        </button>
    </td>
</form>
