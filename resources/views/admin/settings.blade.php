@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.aside')
            <div class="col-10 d-flex pt-5 align-items-center flex-column">

                <div class="setting-card">
                    <a href="{{ route('admin.types.index') }}">
                        <i class="fa-brands fa-codepen"></i>
                        GESTISCI CATEGORIE
                    </a>
                </div>

                <div class="setting-card">
                    <a href="{{ route('admin.technologies.index') }}">
                        <i class="fa-brands fa-html5"></i>
                        GESTISCI TECNOLOGIE
                    </a>
                </div>

            </div>
        @endsection

        @section('title')
            Dashboard
        @endsection
