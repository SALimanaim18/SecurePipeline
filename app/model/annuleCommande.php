<?php
include 'connexion.php';

if (!empty($_GET['idCommande'])) {
    // Supprimer la commande
    $sqlDeleteCommande = "DELETE FROM commande WHERE id= ?";
    $reqDeleteCommande = $connexion->prepare($sqlDeleteCommande);
    $reqDeleteCommande->execute(array($_GET['idCommande']));

    // Si la commande a été supprimée avec succès
    if ($reqDeleteCommande->rowCount() != 0) {
        $_SESSION['message']['text'] = "Commande supprimée avec succès";
        $_SESSION['message']['type'] = "success";
    } else {
        $_SESSION['message']['text'] = "Impossible de supprimer la commande";
        $_SESSION['message']['type'] = "danger";
    }
} else {
    $_SESSION['message']['text'] = "ID de commande manquant";
    $_SESSION['message']['type'] = "danger";
}

// Redirection vers la page de commande
header('Location: ../vue/commande.php');
?>