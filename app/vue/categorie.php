<?php
include 'entete.php';

if (!empty($_GET['id'])) {
    $categorie = getCategorie($_GET['id']);
}

?>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action=" <?= !empty($_GET['id']) ?  "../model/modifCategorie.php" : "../model/ajoutCategorie.php" ?>" method="get">
                <label for="libelle_categorie">Libelle</label>
                <input value="<?= !empty($_GET['id']) ?  $categorie['libelle_categorie'] : "" ?>" type="text" name="libelle_categorie" id="libelle_categorie" placeholder="Veuillez saisir le libéllé">
                <input value="<?= !empty($_GET['id']) ?  $categorie['id'] : "" ?>" type="hidden" name="id" id="id" >

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
                    <th>Libelle categorie</th>
                    <th>Action</th>
                </tr>
                <?php
                $categories = getCategorie();

                if (!empty($categories) && is_array($categories)) {
                    foreach ($categories as $key => $value) {
                ?>
                        <tr>
                            <td><?= $value['libelle_categorie'] ?></td>
                            <td><a href="?id=<?= $value['id'] ?>"><i class='bx bx-edit-alt'></i></a>
                            <a onclick="annuleCategorie(<?= $value['id'] ?>, '<?= $value['libelle_categorie'] ?>')" style="color: red;"><i class='bx bx-stop-circle'></i></a>
                            </td>
                        </tr>
                <?php

                    }
                }
                ?>
            </table>
        </div>
        <div>
      <a href="../model/ajoutCategorie.php" class="add-client-link small" onclick="clearValidationMessages()"><i class='bx bx-plus'></i> </a></div>
    </div>

</div>
</section>

<?php
include 'pied.php';
?>
<script>
function annuleCategorie(id) {
    if (confirm("Voulez-vous vraiment annuler cette vente ?")) {
        window.location.href = "../model/annuleCategorie.php?id_categorie=" + id;
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