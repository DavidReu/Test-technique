<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/fullcalendar-5/lib/main.css">
    <script src="/fullcalendar-5/lib/main.js"></script>
    <title>Gestion d'attribution d'ordinateurs</title>
</head>

<body>
    <header>
        <!---------- Navbar ---------->
        <?php include('views/auth/nav.php') ?>
        <!---------- Fin Navbar ---------->
    </header>

    <div class="container-fluid text-center my-2">
        <h1>Centre culturel attribution des ordinateurs</h1>
    </div>
    <div>
        <?php echo $content ?>
    </div>
    <footer>
        <script src="/public/js/script.js"></script>
    </footer>
</body>

</html>