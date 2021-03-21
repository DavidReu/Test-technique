<!-- Page affichant la liste des utilisateurs inscris sous forme de tableau avec la possiblité de modifier ou supprimer un utilisateur -->
<div>
    <div class="text-center my-3">
        <h4>Liste des utilisateurs</h4>
    </div>
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <table class="text-center col-md-12 mt-3 table table-striped align-middle">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Mail</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $key => $value) : ?>
                        <tr class="rowUser-<?php echo $value['id'] ?>">
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['first_name'] ?></td>
                            <td><?php echo $value['mail'] ?></td>
                            <td>
                                <div>
                                    <form class="d-flex justify-content-around">
                                        <a class="btn btn-info" href="/utilisateur/modifier?id=<?php echo $value['id'] ?>">Modifier</a>
                                        <a class="btn btn-info" href="/utilisateur/supprimer?id=<?php echo $value['id'] ?> " onclick="return confirm('Voulez vous vraiment supprimer cette utilisateur ?')">Supprimer</a>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>