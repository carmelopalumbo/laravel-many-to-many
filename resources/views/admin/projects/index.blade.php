@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.aside')
            <div class="col-10">
                @include('admin.projects.partials.sessions')
                <div class="text-center pb-4">
                    <a class="btn btn-success fw-bold" href="{{ route('admin.projects.create') }}">AGGIUNGI PROGETTO</a>
                </div>


                <table class="table table-striped w-75 m-auto">
                    <thead>
                        <tr>
                            <th scope="col">
                                <a class="{{ $direction === 'desc' ? 'desc' : 'asc' }}"
                                    href="{{ route('admin.orderby', ['name', $direction]) }}">NOME</a>
                            </th>
                            <th scope="col">
                                <a class="{{ $direction === 'desc' ? 'desc' : 'asc' }}"
                                    href="{{ route('admin.orderby', ['client_name', $direction]) }}">NOME CLIENT</a>
                            </th>
                            <th scope="col">AZIONI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($my_projects as $project)
                            <tr>
                                <td>{{ $project->name }} <span
                                        class="badge text-bg-dark ms-2">{{ $project->type?->name }}</span>
                                </td>
                                <td>{{ $project->client_name }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('admin.projects.show', $project) }}"><i
                                            class="fa-regular fa-eye"></i></a>
                                    <a class="btn btn-warning mx-2" href="{{ route('admin.projects.edit', $project) }}"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                    @include('admin.projects.partials.delete-form')
                                </td>
                            </tr>
                        @empty
                    <tbody>
                        <tr>
                            <td class="fw-bold">
                                Nessun progetto trovato.
                            </td>
                            <td class="fw-bold">
                                N/D
                            </td>
                            <td class="fw-bold">
                                N/D
                            </td>
                        </tr>
                    </tbody>
                    @endforelse
                    </tbody>
                </table>

                <div class="pt-3 d-flex justify-content-center pag-box">
                    {{ $my_projects->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection

@section('title')
    Progetti
@endsection
