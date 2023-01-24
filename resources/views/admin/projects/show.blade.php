@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.aside')
            <div class="col-1 mt-5">
                <a href="{{ route('admin.projects.index') }}">
                    <i class="fa-solid fa-arrow-left arrow"></i>
                </a>
            </div>
            <div class="col-9">
                <div class="card m-auto mt-5" style="width: 30rem;">
                    @if ($project->cover_image)
                        <img src="{{ asset('storage/' . $project->cover_image) }}" class="card-img-top thumb"
                            alt="{{ $project->image_original_name }}">
                    @else
                        <img src="{{ Vite::asset('resources/image/noimage.jpeg') }}" class="card-img-top thumb"
                            alt="noimage">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title text-center pt-3 fw-bold">{{ $project->name }}</h5>
                        <span class="badge text-bg-info d-block mx-auto my-2 w-25">{{ $project->type?->name }}</span>
                        <p class="card-text">{!! $project->summary !!}</p>
                        <div class="d-flex justify-content-center py-3">
                            <a href="{{ route('admin.projects.edit', $project) }}"
                                class="btn btn-warning mx-3 fw-bold">MODIFICA</a>
                            <form onsubmit="return confirm('Confermi l\'eliminazione di {{ $project->name }} ?')"
                                class="d-inline" method="POST" action="{{ route('admin.projects.destroy', $project) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger fw-bold" type="submit">ELIMINA</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    {{ $project->name }}
@endsection
