@extends('layout')

@section('title', 'Modification-Etudiants')

@section('content')
<div class="text-center">
    <div class="d-flex justify-content-center flex-col mt-5">
        <div class="col-md-8 card">
            <h3 class="card-header mx-auto">Modifier Etudiant</h3>
            <div class="card-body">
                <form method="POST" action="{{ route('editStudent', $etudiant) }}" >
                    {{ method_field('patch')}}
                    @csrf
                    <div class="row mb-3">
                        <label for="nom" class="col-md-4 col-form-label text-md-end">Nom:</label>

                        <div class="col-md-6">
                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" autofocus value="{{ old('nom', $etudiant->nom) }}">
                            @error('nom')
                            <span class="invalid-feedback text-start" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="prenom" class="col-md-4 col-form-label text-md-end">Prénom:</label>

                        <div class="col-md-6">
                            <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" autofocus value="{{ old('prenom', $etudiant->prenom) }}">
                            @error('prenom')
                            <span class="invalid-feedback text-start" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="datnais" class="col-md-4 col-form-label text-md-end">Date de naissance:</label>
                        <div class="col-md-6">
                            <input id="datnais" type="date" class="form-control @error('datnais') is-invalid @enderror" name="datnais" autofocus value="{{ old('datnais', $etudiant->datnais) }}">
                            @error('datnais')
                            <span class="invalid-feedback text-start" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ville" class="col-md-4 col-form-label text-md-end">Ville:</label>
                        <div class="col-md-6">
                            <input id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" autofocus value="{{ old('ville', $etudiant->ville) }}">
                            @error('ville')
                            <span class="invalid-feedback text-start" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 d-flex">
                        <label for="sexe" class="col-md-4 col-form-label text-md-end">Sexe:</label>

                        <div class="col-md-6 btn-group d-flex align-items-center column-gap-3" role="group" aria-label="Choose sexe">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexe" id="M" value="M" {{ old('sexe', $etudiant->sexe) === 'M' ? 'checked' : '' }}>
                                <label class="form-check-label" for="M">
                                    Masculin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexe" id="F" value="F" {{ old('sexe', $etudiant->sexe) === 'F' ? 'checked' : '' }}>
                                <label class="form-check-label" for="F">
                                    Féminin
                                </label>
                            </div>
                        </div>

                        <div class="row my-3">
                            <label for="option_id" class="col-md-4 col-form-label text-md-end">Option:</label>
                            <div class="col-md-6">
                                <select name="option_id" class="form-select ms-2 form-control @error('option_id') is-invalid @enderror" aria-label="Select option">
                                    @foreach ($options as $option)
                                        <option {{ old('option_id', $etudiant->option_id) == $option->id ? 'selected' : '' }} name="{{$option->code_opt}}" value="{{$option->id}}" > {{$option->code_opt}} </option>
                                        @endforeach
                                </select>
                                @error('option_id')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-8 mx-auto">
                            <button type="submit" class="btn btn-primary">
                                S'inscrire
                            </button>
                        </div>
                </form>
            </div>
            @if(session('success'))
            <div class="alert alert-success col-md-5 mx-auto" role="alert">
                {{ session('success')}}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection()