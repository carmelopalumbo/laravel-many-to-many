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

            <div class="col-9 d-flex align-items-center">

                <div>
                    @if ($project->cover_image)
                        <img src="{{ asset('storage/' . $project->cover_image) }}" class="thumb"
                            alt="{{ $project->image_original_name }}">
                    @else
                        <img src="{{ Vite::asset('resources/image/noimage.jpeg') }}" class="thumb" alt="noimage">
                    @endif
                </div>

                <div>
                    <h2 class="text-center py-3 w-75 m-auto fw-bold">{{ $project->name }}</h2>

                    <div class="d-flex justify-content-center">
                        <span class="badge text-bg-dark">{{ $project->type?->name }}</span>
                    </div>

                    @if ($project->technologies)
                        <div class="d-flex justify-content-center py-3">
                            @foreach ($project->technologies as $technology)
                                <span class="badge text-bg-info mx-1">{{ $technology->name }}</span>
                            @endforeach
                        </div>
                    @endif

                    <div class="w-75 m-auto text-center py-3">{!! $project->summary !!}</div>
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
@endsection

@section('title')
    {{ $project->name }}
@endsection
