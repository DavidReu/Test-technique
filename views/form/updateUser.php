<div class="container-fluid mb-5 mt-1">
    <div class="row">
        <form action="" method="POST" class="d-flex flex-column align-items-center w-100" enctype="multipart/form-data">
            <h4>Modifiez les informations de l'utilisateur</h4>
            <label for="nom">Nom</label>
            <input class="col-5 my-2 form-control w-25" type="text" name="name" value="<?php echo $user->name; ?>">
            <label for="prenom">Prénom</label>
            <input class="col-5 my-2 form-control w-25" name="firstname" value="<?php echo $user->first_name ?>">
            <label for="mail">Email</label>
            <input class="col-5 my-2 form-control w-25" type="email" name="mail" value="<?php echo $user->mail ?>">
            <input type="submit" class="btn btn-info col-2" value="Modifier" name="modifier">
        </form>
    </div>
</div>