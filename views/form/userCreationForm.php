<div class="container mt-5 mb-5">
    <div class="row d-flex align-items-center justify-content-center">
        <form class="col-md-6" method="POST" name="myForm">
            <div class="px-5 py-5 formRegister">
                <h5 class="mt-3">Inscrivez un utilisateur</h5>
                <div class="form-input my-2"><input onkeyup="usersend()" id="mail" type="email" class="form-control" placeholder="Mail" name="mail" required pattern='^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$'> </div>
                <div class="form-input my-2"><input onkeyup="usersend()" id="name" type="text" class="form-control" placeholder="Nom" name="name" required pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$"> </div>
                <div class="form-input my-2"><input onkeyup="usersend()" id="firstname" type="text" class="form-control" placeholder="Prenom" name="firstname" required pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$"> </div>
                <div class="mt-3 text-center">
                    <input id="registUser" type="submit" class="btn btn-primary col-3 rounded-pill" value="Inscrire" name="regist" disabled>
                </div>
            </div>
        </form>
    </div>
</div>