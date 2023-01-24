<form onsubmit="return confirm('Confermi l\'eliminazione di {{ $project->name }} ?')" class="d-inline" method="POST"
    action="{{ route('admin.projects.destroy', $project) }}">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
</form>
