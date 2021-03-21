<!-- Formulaire d'enregistrement d'un ordinateur
la fonction send désactive/active le bouton selon si le formulaire est remplie ou non 
l'état doit être aussi sélectionner 
 -->
<div class="container mt-5 mb-5">
    <div class="row d-flex align-items-center justify-content-center">
        <form class="col-md-6" method="POST" name="myForm">
            <div class="px-5 py-5 formRegister">
                <h5 class="mt-3">Enregistrer un ordinateur</h5>
                <div class="form-input my-2"><input onkeyup="send()" id="brand" type="text" class="form-control" placeholder="Marque" name="brand" required pattern='^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$'> </div>
                <div class="form-input my-2"><input onkeyup="send()" id="username" type="text" class="form-control" placeholder="Numéro identifiant" name="username" required> </div>
                <div class="my-2"><select onselect="send()" onclick="send()" onchange="send()" id="status" class="form-select" aria-label="Default select example" name="status">
                        <option selected value="default">Sélectionnez un état</option>
                        <option value="Fonctionne">Fonctionne</option>
                        <option value="Panne">Panne</option>
                        <option value="Reparation">Reparation</option>
                    </select>
                </div>
                <div class="mt-3 text-center">
                    <input id="registComputer" type="submit" class="btn btn-primary col-3 rounded-pill" value="Enregistrer" name="regist" disabled>
                </div>
            </div>
        </form>
    </div>
</div>