<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="stylesheet" href="../css/app.css">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <title>@yield('title')</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="d-flex flex-row">
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
        <div style="width: 100%; padding: 20px 0;">
            <div class="text-center pb-5 border-bottom border-2">
                <h2>REPUBLIQUE DU BENIN</h2>
                <h5>MINISTERE DE L'ENSEIGNEMENT SUPERIEUR ET DE LA RECHERCHE SCIENTIFIQUE (M.E.S.R.S) </h5>
                <h5>DIRECTION DES EXAMENS ET CONCOURS (D.E.C) </h5>
            </div>
            <main class="container">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>