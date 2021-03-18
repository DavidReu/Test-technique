<div>
    <div class="text-center my-3">
        <h4>Liste des ordinateurs</h4>
    </div>
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <table class="text-center col-md-12 mt-3 table table-dark table-striped align-middle">
                <thead>
                    <tr>
                        <th>Marque</th>
                        <th>Identifiant</th>
                        <th>Etat</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($computers as $key => $value) : ?>
                        <tr class="rowPc-<?php echo $value['id'] ?>">
                            <td><?php echo $value['brand'] ?></td>
                            <td><?php echo $value['username'] ?></td>
                            <td><?php echo $value['status'] ?></td>
                            <td>
                                <div>
                                    <form class="d-flex justify-content-around">
                                        <a class="btn btn-info" href="/ordinateur/modifier?id=<?php echo $value['id'] ?>">Modifier</a>
                                        <a class="btn btn-info" href="/ordinateur/supprimer?id=<?php echo $value['id'] ?>">Supprimer</a>
                                        <!-- <button class="deleteUser btn btn-info" type="submit" name="delete" value="<?php // echo $value['id'] 
                                                                                                                        ?>">Supprimer</button> -->
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