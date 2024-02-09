@extends('layouts.admin')

@section('content')
    <div class="project-update container">
        <div class="row justify-content-center">

            {{-- Link per tonare a tutti i progetti --}}
            <a href="{{ route('admin.projects.index') }}"
                class="btn custom-btn orange text-uppercase mb-5 mt-5 fw-bold mx-auto d-block">Take a look at
                all the
                projects</a>

            <div class="col-12 card-custom p-5">
                <h2 class="text-center py-5">Create another project</h2>



                {{-- Form di upload nuovo progetto --}}
                <form class="d-flex flex-column align-items-center gap-3 w-100" action="{{ route('admin.projects.store') }}"
                    method="POST">

                    {{-- Token autenticazione  --}}
                    @csrf

                    {{-- Input titolo --}}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text text-capitalize">title</span>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ old('title') }}" required>
                        @error('title')
                            <div class="alert alert-danger m-0">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input URL thumb --}}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text text-capitalize">thumb URL</span>
                        <input type="text" class="form-control @error('thumb') is-invalid @enderror" name="thumb"
                            value="{{ old('thumb') }}" required>
                        @error('thumb')
                            <div class="alert alert-danger m-0">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input descrizione --}}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text text-capitalize">description</span>
                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger m-0">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input data di inizio progetto --}}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text text-capitalize">start date</span>
                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date"
                            name="start_date" value="{{ old('start_date') }}">
                        @error('start_date')
                            <div class="alert alert-danger m-0">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input data di fine progetto --}}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text text-capitalize">end date</span>
                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date"
                            name="end_date" value="{{ old('end_date') }}">
                        @error('end_date')
                            <div class="alert alert-danger m-0">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input categoria --}}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text text-capitalize">type</span>
                        <select class="form-select" aria-label="Default select example" name="type_id">
                            <option selected>Choose type...</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @if (old('type_id') == $type->id) selected @endif>
                                    {{ $type->title }}</option>
                            @endforeach


                        </select>
                        @error('type_id')
                            <div class="alert alert-danger m-0">{{ $message }}</div>
                        @enderror
                    </div>




                    {{-- Input linguaggio --}}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text text-capitalize">language</span>
                        <input type="text" class="form-control @error('language') is-invalid @enderror" name="language"
                            value="{{ old('language') }}" required>
                        @error('language')
                            <div class="alert alert-danger m-0">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input status --}}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text text-capitalize">status</span>
                        <input type="text" class="form-control @error('status') is-invalid @enderror" name="status"
                            value="{{ old('status') }}">
                        @error('status')
                            <div class="alert alert-danger m-0">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Bottone submit --}}
                    <button type="submit"
                        class="btn custom-btn white text-uppercase mb-4 mt-5 fw-bold mx-auto d-block">Create
                        project</button>
                </form>
            </div>
        </div>
    </div>
@endsection
