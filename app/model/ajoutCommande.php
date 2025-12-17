<?php
include 'connexion.php';
include_once "function.php";

$sql_insert_commande = "INSERT INTO commande(id_article, id_fournisseur, quantite, prix)
                        VALUES(?, ?, ?, ?)";
$req_insert_commande = $connexion->prepare($sql_insert_commande);

$req_insert_commande->execute(array(
    $_POST['id_article'],
    $_POST['id_fournisseur'],
    $_POST['quantite'],
    $_POST['prix']
));

if ($req_insert_commande->rowCount() != 0) {

    $sql_update_article = "UPDATE article SET quantite=quantite+? WHERE id=?";
    $req_update_article = $connexion->prepare($sql_update_article);

    $req_update_article->execute(array(
        $_POST['quantite'],
        $_POST['id_article'],
    ));

    if ($req_update_article->rowCount() != 0) {
        $_SESSION['message']['text'] = "Commande effectuée avec succès";
        $_SESSION['message']['type'] = "success";
    } else {
        $_SESSION['message']['text'] = "Impossible de mettre à jour l'article";
        $_SESSION['message']['type'] = "danger";
    }
} else {
    $_SESSION['message']['text'] = "Une erreur s'est produite lors de la commande";
    $_SESSION['message']['type'] = "danger";
}

header('Location: ../vue/commande.php');

