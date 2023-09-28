@extends('layout')

@section('header')
<div class="border-right border-2" id="sidebar" style="background: #e2e8f0; width: 17rem; min-height: 100vh; border-right: 4px double #dee2e6;">
    <div class="p-4 mb-4">
        <h1 class="text-primary fs-3 mt-4 fw-semibold">Menu</h1>
    </div>
    <ul class="nav flex-column px-3">
        <li class="nav-item">
            <a href="inscription" class="nav-link py-3 active text-dark fw-bold">Inscription</a>
        </li>
        <li class="nav-item">
            <a href="list" class="nav-link py-3 text-dark fw-bold">Liste des etudiants</a>
        </li>
    </ul>
</div>
@endsection()