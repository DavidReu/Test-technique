<div class="container-fluid mb-5 mt-1">
    <div class="row">
        <form action="" method="POST" class="d-flex flex-column align-items-center w-100" enctype="multipart/form-data">
            <h4>Modifiez les informations de l'ordinateur</h4>
            <label for="nom">Marque</label>
            <input class="col-5 my-2 form-control w-25" type="text" name="brand" value="<?php echo $computer->brand; ?>">
            <label for="prenom">Identifiant</label>
            <input class="col-5 my-2 form-control w-25" name="username" value="<?php echo $computer->username ?>">
            <label for="status">Etat</label>
            <span>Etat actuel : <?php echo $computer->status ?></span>
            <div class="my-2">
                <select class="form-select" aria-label="Default select example" name="status">
                    <option selected>Sélectionnez un état</option>
                    <option value="Fonctionne">Fonctionne</option>
                    <option value="Panne">Panne</option>
                    <option value="Reparation">Reparation</option>
                </select>
            </div>
            <input type="submit" class="btn btn-info col-2" value="Modifier" name="modifier">
        </form>
    </div>
</div>