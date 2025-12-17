<?php
include 'entete.php';

if (!empty($_GET['id'])) {
    $fournisseur = getFournisseur($_GET['id']);
}

?>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action=" <?= !empty($_GET['id']) ?  "../model/modifFournisseur.php" : "../model/ajoutFournisseur.php" ?>" method="post">
                <label for="nom">Nom</label>
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['nom'] : "" ?>" type="text" name="nom" id="nom" placeholder="Veuillez saisir le nom">
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['id'] : "" ?>" type="hidden" name="id" id="id" >
                
                <label for="prenom">Prénom</label>
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['prenom'] : "" ?>" type="text" name="prenom" id="prenom" placeholder="Veuillez saisir le prénom">

                <label for="telephone">N° de téléphone</label>
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['telephone'] : "" ?>" type="text" name="telephone" id="telephone" placeholder="Veuillez saisir le N° de téléphone">
                
                <label for="adresse">Adresse</label>
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['adresse'] : "" ?>" type="text" name="adresse" id="adresse" placeholder="Veuillez saisir l'adresse">

                <button type="submit">Valider</button>

                <?php
                if (!empty($_SESSION['message']['text'])) {
                ?>
                    <div class="alert <?= $_SESSION['message']['type'] ?>">
                        <?= $_SESSION['message']['text'] ?>
                    </div>
                <?php
                }
                ?>
            </form>

        </div>
        <div class="box">
            <table class="mtable">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Action</th>
                </tr>
                <?php
                $fournisseurs = getFournisseur();

                if (!empty($fournisseurs) && is_array($fournisseurs)) {
                    foreach ($fournisseurs as $key => $value) {
                ?>
                        <tr>
                            <td><?= $value['nom'] ?></td>
                            <td><?= $value['prenom'] ?></td>
                            <td><?= $value['telephone'] ?></td>
                            <td><?= $value['adresse'] ?></td>
                            <td><a href="?id=<?= $value['id'] ?>"><i class='bx bx-edit-alt'></i></a>
                            <a onclick="annuleFournisseur(<?= $value['id'] ?>)" style="color: red;"><i class='bx bx-stop-circle'></i></a>

                            </td>
                        </tr>
                <?php

                    }
                }
                ?>
            </table>
        </div>
        <div>
      <table> <tr><td><a href="../model/ajoutFournisseur.php" class="add-client-link small" onclick="clearValidationMessages()"><i class='bx bx-plus'></i> </a></td></tr>
</table></div>
    </div>

</div>
</section>

<?php
include 'pied.php';
?>
<script>
    function annuleFournisseur(id) {
    if (confirm("Voulez-vous vraiment supprimer ce fournisseur ?")) {
        window.location.href = "../model/annuleFournisseur.php?id=" + id;
    }
}
</script>
<style>

.add-client-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}

.add-client-link:hover {
    background-color: #0056b3;
}
.small {
    font-size: 14px; /* Choisissez la taille de police qui vous convient */
    padding: 5px 10px; /* Choisissez la marge intérieure qui vous convient */
}
</style>