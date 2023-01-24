@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.aside')
            <div class="col-10">
                @include('admin.types.partials.sessions')

                <form action="{{ route('admin.types.store') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3 w-50 m-auto">
                        <input name="name" type="text" class="form-control"
                            placeholder="Aggiungi nuovo linguaggio o framework . . . ">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fa-solid fa-square-plus"></i>
                        </button>
                    </div>
                </form>

                <table class="table w-50 m-auto mt-5">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOME</th>
                            <th scope="col">AGGIORNA</th>
                            <th scope="col">ELIMINA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                <th scope="row">{{ $type->id }}</th>
                                @include('admin.types.partials.update-form')
                                @include('admin.types.partials.delete-form')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pt-3 d-flex justify-content-center pag-box">
                    {{ $types->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    Gestisci Linguaggi
@endsection
