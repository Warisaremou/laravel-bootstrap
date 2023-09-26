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