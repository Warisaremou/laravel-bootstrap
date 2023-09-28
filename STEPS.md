1. Créer un projet laravel

2. Créer une table (dans ce cas il s'agit de la table Option et Etudiant)
    2.1. Créer le modèle, la migration, le factory et le seeder avec la commande: php artisan make:model Etudiant -mfs

    NB: 
    - Les models sont dans app\Models
    - Les migrations sont dans database\migrations
    - Les factories sont dans database\factories
    - Les seeders sont dans database\seeders

    2.2. Créer les colonnes de chaque table dans leurs fichiers de migration (Voir image 1 et 2)

    2.3. Configurer le fichier .env situé à la racine du projet en y ajoutant les informations de connexion à la base de données: 
        - DB_DATABASE=tp_exam
        - DB_PASSWORD=
    NB: Pour DB_PASSWORD, il faut mettre le mot de passe de votre base de données

    2.4. Lancer la migration avec la commande: php artisan migrate
        - Ainsi les tables seront créées dans la base de données

    2.5. Créer un seeder pour la table Option (Voir image 3)

    2.6. Lancer le seeder avec la commande: php artisan db:seed
        - Ainsi la/les donnée(s) seras/seront insérée(s) dans la table Option

    2.7. Créer un view (une vue) pour le formulaire d'ajout d'un étudiant (Voir image 4)

        NB: 
        - Les views sont dans resources\views
        - Dans mon cas j'utilise bootstrap pour le style

    2.9. Ajouter la route /inscription dans le fichier routes\web.php (Voir image 5)

        NB: 
        - J'ai pas gérer la route comme on la fait en classe mais c'est la même chose
        - C'est dans la route tu pourras ajouter les méthodes GET, POST

    2.10. Créer un controller pour l'ajout d'un étudiant avec la commande: php artisan make:controller InscriptionController

        NB:
        - Les controllers sont dans app\Http\Controllers

    2.11. Créer une fonction index et createStudent dans le controller InscriptionController (Voir image 6)

    2.12. Oublie pas de modifier la route en ajoutant le controller et la fonction


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
            @if($filteredStudents)
            @foreach ($filteredStudents as $filteredStudent)
            <tr>
                <td> {{$filteredStudent->id}} </td>
                <td> {{$filteredStudent->nom}} </td>
                <td> {{$filteredStudent->prenom}} </td>
                <td> {{$filteredStudent->sexe}} </td>
                <td class="dropdown">
                    <button class="btn border-secondary border-1 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Dropdown button -->
                    </button>
                    <ul class="dropdown-menu">
                        <form method="POST" action="{{ route('deleteStudent', $filteredStudent->id) }}">
                            {{ method_field('delete')}}
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Supprimer</button>
                        </form>
                    </ul>
                </td>
            </tr>
            @endforeach
            @else

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
                    </ul>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>

    @if(session('delete'))
    <div class="alert alert-danger col-md-5 mx-auto fw-light" role="alert">
        L'étudiant a été supprimer avec succès
    </div>
    @endif
</div>
@endsection()