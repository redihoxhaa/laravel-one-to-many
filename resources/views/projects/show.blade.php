@extends('layouts.admin')

@section('content')
    <div class="project-show container">

        <div class="mt-4">
            {{-- Collegamento a tutti i fumetti --}}
            <a href="{{ route('admin.projects.index') }}"
                class="btn custom-btn orange text-uppercase mb-5 mt-5 fw-bold mx-auto d-block">Take
                a look at all
                the
                projects</a>

            <div class="card-custom">
                <p
                    class=" header language fw-bold @if ($project->status === 'completed') text-success @else text-secondary @endif w-25 ">
                    {{ $project->status }}</p>
                <div class="main-content">
                    {{-- Titolo progetto --}}

                    <h3 class="title py-3">{{ $project->title }}</h3>

                    {{-- Data inizio progetto --}}
                    <p class="start-date pt-1">Project started on
                        {{ \Carbon\Carbon::parse($project->start_date)->format('M d Y') }}</p>

                    {{-- Data fine progetto --}}
                    @isset($project->end_date)
                        <p class="end-date">and ended on
                            {{ \Carbon\Carbon::parse($project->end_date)->format('M d Y') }}</p>
                    @endisset

                    {{-- Categoria progetto --}}
                    <p class="category text-uppercase badge bg-light text-black w-auto mx-auto my-3 p-2">
                        {{ $project->category }}
                    </p>

                    <div class="lang-container">
                        <div class="skill-box">
                            <span class="title">{{ $project->language }} </span>
                            <div class="skill-bar">
                                <span class="skill-per html">
                                </span>
                            </div>
                        </div>

                        <div class="skill-box">
                            <span class="title">SCSS</span>

                            <div class="skill-bar">
                                <span class="skill-per scss">

                                </span>
                            </div>
                        </div>
                        <div class="skill-box">
                            <span class="title">Boostrap</span>

                            <div class="skill-bar">
                                <span class="skill-per Boostrap">

                                </span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="footer">

                    {{-- Pulsanti --}}
                    <div class="buttons row g-0">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="col-6"><button class="ui-btn">
                                <div class="text-uppercase">Edit</div>
                            </button>
                        </a>


                        <button class="ui-btn col-6" data-bs-toggle="modal" data-bs-target="#my-dialog-{{ $project->id }}">
                            <div class="text-uppercase">
                                Delete
                            </div>
                        </button>
                    </div>

                    {{-- Modale --}}
                    <div class="modal" id="my-dialog-{{ $project->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content card-custom">

                                {{-- Messaggio di alert --}}
                                <div class="modal-header text-center">
                                    <h3>Are you sure?</h3>
                                </div>

                                {{-- Informazione operazione --}}
                                <div class="modal-body text-center">
                                    You are about to delete {{ $project->title }}</span>
                                </div>

                                <div class="modal-footer">

                                    {{-- Pulsante annulla --}}
                                    <button class="btn custom-btn white text-uppercase mb-4 mt-5 fw-bold"
                                        data-bs-dismiss="modal">Keep
                                    </button>

                                    {{-- Pulsante elimina --}}
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn custom-btn white text-uppercase mb-4 mt-5 fw-bold" type="submit"
                                            value="DELETE">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
