<div class="container mt-5 mb-5">
    <div class="row d-flex align-items-center justify-content-center">
        <form class="col-md-6" method="POST" name="myForm">
            <div class="px-5 py-5 formRegister">
                <h5 class="mt-3">Enregistrer un ordinateur</h5>
                <div class="form-input my-2"><input type="text" class="form-control" placeholder="Marque" name="brand" required pattern='^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$'> </div>
                <div class="form-input my-2"><input type="text" class="form-control" placeholder="Numéro identifiant" name="username" required> </div>
                <div class="my-2"><select class="form-select" aria-label="Default select example" name="status">
                        <option selected>Sélectionnez un état</option>
                        <option value="Fonctionne">Fonctionne</option>
                        <option value="Panne">Panne</option>
                        <option value="Reparation">Reparation</option>
                    </select> </div>
                <div class="mt-3 text-center">
                    <input type="submit" class="btn btn-primary col-3 rounded-pill" value="Enregistrer" name="regist">
                </div>
            </div>
        </form>
    </div>
</div>