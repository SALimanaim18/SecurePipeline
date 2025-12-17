<?php
include 'connexion.php';

if (!empty($_GET['id'])) {
 
    $sqlDeleteCommande = "DELETE FROM client WHERE id= ?";
    $reqDeleteCommande = $connexion->prepare($sqlDeleteCommande);
    $reqDeleteCommande->execute(array($_GET['id']));

    if ($reqDeleteCommande->rowCount() != 0) {
        $_SESSION['message']['text'] = "Client supprimé avec succès";
        $_SESSION['message']['type'] = "success";
    } else {
        $_SESSION['message']['text'] = "Impossible de supprimer le client";
        $_SESSION['message']['type'] = "danger";
    }
} else {
    $_SESSION['message']['text'] = "ID de client manquant";
    $_SESSION['message']['type'] = "danger";
}


header('Location: ../vue/client.php');
?>