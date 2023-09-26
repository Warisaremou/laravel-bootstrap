@extends('layout')

@section('title', 'List-Etudiants')

@section('content')
<div>
    <div class="d-flex justify-content-center flex-col mt-5">
        <h3 class="fw-semibold">Liste des étudiants</h3>
    </div>
    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Sexe</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td> {{$student->id}} </td>
                <td> {{$student->nom}} </td>
                <td> {{$student->prenom}} </td>
                <td> {{$student->sexe}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection()