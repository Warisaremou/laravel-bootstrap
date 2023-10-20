@extends('layout')

@section('title', 'List-Etudiants')

@section('content')
<div>
    <div class=" my-3 col-md-5 mx-auto py-2">
        <h3 class="fs-4 fw-semibold text-center">Rechercher les candidats d'une option</h3>
        <!-- @dump($options) -->
        <form method="GET" action="{{ route('findStudentByOption') }}">
            @csrf
            <div class="d-flex flex-row my-3">
                <label for="option_id" class="col-md-4 col-form-label text-md-end">Dans l'option:</label>
                <div>
                    <select name="option_id" class="form-select ms-2 form-control @error('option_id') is-invalid @enderror" aria-label="Select option">
                        <option name="Select-option" value="Select-Option"> Select-Option </option>
                        @foreach ($options as $option)
                        <option name="{{$option->code_opt}}" value="{{$option->id}}">
                            {{$option->code_opt}}
                        </option>
                        @endforeach
                    </select>
                    @error('option_id')
                    <span class="invalid-feedback" role="alert">
                        Indiquez l'option svp
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-2 mx-auto">
                <button type="submit" class="btn btn-primary">
                    Envoyer
                </button>
            </div>
        </form>
    </div>
    <h3 class="fw-medium text-center fs-4">Liste des étudiants</h3>
    <table class="table table-hover table-bordered mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Sexe</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td> {{$student->id}} </td>
                <td> {{$student->nom}} </td>
                <td> {{$student->prenom}} </td>
                <td> {{$student->sexe}} </td>
                <td class="dropdown">
                    <button class="btn border-secondary border-1 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Dropdown button -->
                    </button>
                    <ul class="dropdown-menu">
                        <form method="POST" action="{{ route('deleteStudent', $student->id) }}">
                            {{ method_field('delete')}}
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Supprimer</button>
                        </form>
                        <button class="dropdown-item text-primary">
                            <a class="nav-link" href="{{route('editStudentForm', [$student])}}">Modifier</a>
                        </button>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- @dump(count($students)); --}}
    @if (count($students) > 6)
        {{ $students->links() }}
    @endif

    @if(session('delete'))
    <div class="alert alert-danger col-md-5 mx-auto fw-light" role="alert">
        {{ session('delete')}}
    </div>

    @endif @if(session('success'))
    <div class="alert alert-success col-md-5 mx-auto fw-light" role="alert">
        {{ session('success')}}
    </div>
    @endif
</div>
@endsection()