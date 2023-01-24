@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.aside')
            <div class="col-10">
                <h5 class="text-center pt-4 pb-3 fw-bold">AGGIUNGI NUOVO PROGETTO</h5>

                <form class="w-75 m-auto" action="{{ route('admin.projects.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">NOME PROGETTO</label>
                        <input type="text" value="{{ old('name') }}" name="name"
                            class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="Nome progetto . . . ">
                        @error('name')
                            <p class="error-message">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="client_name" class="form-label">NOME CLIENT</label>
                        <input type="text" value="{{ old('client_name') }}" name="client_name"
                            class="form-control @error('client_name') is-invalid @enderror" id="client_name"
                            placeholder="Nome client utilizzato per il progetto . . . ">
                        @error('client_name')
                            <p class="error-message">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="pb-3">
                        <label for="type" class="form-label">LINGUAGGIO</label>
                        <select id="type" name='type_id' class="form-select" aria-label="Default select example">
                            <option value="">Seleziona un linguaggio o framework . . .</option>
                            @foreach ($types as $type)
                                <option @if ($type->id == old('type_id')) selected @endif value="{{ $type->id }}">
                                    {{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="d-flex justify-content-between">
                        <div class="mb-3 w-75">
                            <label for="cover_image" class="form-label">COPERTINA</label>
                            <input onchange="showImage(event)" type="file" name="cover_image"
                                class="form-control @error('cover_image') is-invalid @enderror" id="cover_image">
                            @error('cover_image')
                                <p class="error-message">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <img width="100" id="preview" alt="">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="summary" class="form-label">SOMMARIO</label>
                        <textarea id="editor" class="form-control @error('summary') is-invalid @enderror" name="summary" id="summary"
                            placeholder="Punti salienti del progetto . . ." rows="3">{{ old('summary') }}</textarea>
                        @error('summary')
                            <p class="error-message">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="links d-flex justify-content-center pt-2">
                        <a class="btn btn-danger" href="{{ route('admin.projects.index') }}">ANNULLA</a>
                        <button type="submit" class="btn btn-success mx-3">AGGIUNGI</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    @include('admin.projects.partials.preview-script')
    @include('admin.projects.partials.editor-script')
@endsection

@section('title')
    Aggiungi
@endsection
