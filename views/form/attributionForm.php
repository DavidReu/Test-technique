<div class="container mt-5 mb-5">
    <div class="row d-flex align-items-center justify-content-center">
        <form class="col-md-6" method="POST" name="myForm">
            <div class="px-5 py-3 formRegister">
                <h5 class="mt-3">Attribuer un utilisateur à un utilisateur</h5>
                <label class="mt-2" for="date">Indiquez la date :</label>
                <div class="form-input my-2"><input onchange="attribute()" id="date" type="date" class="form-control" placeholder="Date" name="date" required> </div>
                <label class="mt-2" for="time_slot_start">Indiquez l'heure de début :</label>
                <div class="form-input my-2"><input onchange="attribute()" id="timeslotstart" type="time" class="form-control" name="time_slot_start" required> </div>
                <label class="mt-2" for="time_slot_end">Indiquez l'heure de fin :</label>
                <div class="form-input my-2"><input onchange="attribute()" id="timeslotend" type="time" class="form-control" name="time_slot_end" required> </div>
                <label class="mt-2" for="user">Sélectionnez un utilisateur :</label>
                <div class="my-2"><select onchange="attribute()" id="user" class="form-select" aria-label="Default select example" name="user">
                        <option value="default">Utilisateur</option>
                        <?php foreach ($users as $key => $valeur) : ?>
                            <option value="<?php echo $valeur['id'] ?>"><?php echo $valeur['name'] . " " . $valeur['first_name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <label class="mt-2" for="computer">Sélectionnez un ordinateur :</label>
                <div class="my-2"><select onchange="attribute()" id="computer" class="form-select" aria-label="Default select example" name="computer">
                        <option value="default">Ordinateur</option>
                        <?php foreach ($computers as $key => $valeur) : ?>
                            <option value="<?php echo $valeur['id'] ?>"><?php echo $valeur['brand'] . " " . $valeur['username'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mt-3 text-center">
                    <input id="registAttribution" type="submit" class="btn btn-primary col-3 rounded-pill" value="Attribuer" name="attribuer" disabled>
                </div>
            </div>
        </form>
    </div>
</div>