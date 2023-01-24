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


                <table class="table table-striped m-auto px-5">
                    <thead>
                        <tr>
                            <th scope="col">
                                <a class="@if (Request::path() === 'admin/projects/orderby/name/desc') desc @elseif (Request::path() === 'admin/projects/orderby/name/asc') asc @endif"
                                    href="{{ route('admin.orderby', ['name', $direction]) }}">NOME</a>
                            </th>
                            <th scope="col">
                                <a class="@if (Request::path() === 'admin/projects/orderby/client_name/desc') desc @elseif (Request::path() === 'admin/projects/orderby/client_name/asc') asc @endif"
                                    href="{{ route('admin.orderby', ['client_name', $direction]) }}">CLIENTE</a>
                            </th>
                            <th scope="col">
                                TECNOLOGIE
                            </th>
                            <th scope="col">AZIONI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($my_projects as $project)
                            <tr>
                                <td class="fst-italic">{{ $project->name }} <span
                                        class="badge text-bg-dark ms-2">{{ $project->type?->name }}</span>
                                </td>
                                <td class="fst-italic">{{ $project->client_name }}</td>
                                <td>
                                    @forelse ($project->technologies as $technology)
                                        <span class="badge rounded-pill text-bg-info">{{ $technology->name }}</span>
                                    @empty
                                        <span class="ps-2">N.D.</span>
                                    @endforelse
                                </td>
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
