<!-- Formulaire de modification d'un utilisateur -->
<div class="container">
    <div class="row mt-5">
        <form action="" method="POST" class="d-flex flex-column align-items-center w-100">
            <div class="px-5 py-5 formRegister">
                <h4>Modifiez les informations de l'utilisateur</h4>
                <label for="nom">Nom</label>
                <input class="col-5 my-2 form-control" type="text" name="name" value="<?php echo $user->name; ?>">
                <label for="prenom">Prénom</label>
                <input class="col-5 my-2 form-control" name="firstname" value="<?php echo $user->first_name ?>">
                <label for="mail">Email</label>
                <input class="col-5 my-2 form-control" type="email" name="mail" value="<?php echo $user->mail ?>">
                <div class="text-center">
                    <input type="submit" class="btn btn-info col-3 rounded-pill signup" value="Modifier" name="modifier">
                </div>
            </div>
        </form>
    </div>
</div>