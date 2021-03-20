<?php
if ($_SESSION['admin'] == true) : ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/attributions">Attributions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ordinateur">Ordinateurs </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/utilisateur">Utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/deconnexion">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php else : ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/connexion">Connexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif ?>