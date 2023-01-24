@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.aside')
            <div class="col-10">
                <h3 class="text-center fw-bold py-4">LINGUAGGI</h3>
                <div class="d-flex justify-content-between flex-wrap">
                    @foreach ($types as $type)
                        <div class="type-box">
                            <h6 class="fw-bold text-center">{{ $type->name }}</h6>
                            <ul>
                                @foreach ($type->projects as $project)
                                    <li>
                                        <a href="{{ route('admin.projects.show', $project) }}">{{ $project->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection

@section('title')
    Linguaggi
@endsection
