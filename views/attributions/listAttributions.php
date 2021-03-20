<div class="container-fluid">
    <form method="GET" class="d-flex mt-4">
        <select class="form-select w-25" name="date" id="attribution-select">
            <option value="">Date</option>
            <?php foreach ($attributions as $key => $value) : ?>
                <option value="<?php echo $value['date'] ?>"><?php echo $value['date'] ?></option>
            <?php endforeach ?>
        </select>
        <button class="btn btn-info mx-2" type="submit">Filtrer</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Heure début</th>
                <th scope="col">Heure fin</th>
                <th scope="col">Utilisateur</th>
                <th scope="col">Ordinateur</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attributionsByDay as $key => $value) : ?>
                <tr class="align-middle">
                    <th scope="row"><?php echo $value['date'] ?></th>
                    <td><?php echo $value['time_slot_start'] ?></td>
                    <td><?php echo $value['time_slot_end'] ?></td>
                    <td><?php echo $value['name'] . " " . $value['first_name'] ?></td>
                    <td><?php echo $value['username'] ?></td>
                    <td>
                        <form class="d-flex justify-content-around align-content-center" style=" margin:0!important;">
                            <a class="btn btn-info" href="/attribution/supprimer?id=<?php echo $value['id'] ?> " onclick="return confirm('Voulez vous vraiment supprimer cette attribution ?')">Supprimer</a>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>