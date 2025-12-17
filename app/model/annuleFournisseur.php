<?php
include 'connexion.php';

if (!empty($_GET['id'])) {
    // Supprimer le fournisseur
    $sqlDeleteFournisseur = "DELETE FROM fournisseur WHERE id = ?";
    $reqDeleteFournisseur = $connexion->prepare($sqlDeleteFournisseur);
    $reqDeleteFournisseur->execute(array($_GET['id']));

    // Si le fournisseur est supprimé avec succès
    if ($reqDeleteFournisseur->rowCount() != 0) {
        $_SESSION['message']['text'] = "Fournisseur supprimé avec succès";
        $_SESSION['message']['type'] = "success";
    } else {
        $_SESSION['message']['text'] = "Impossible de supprimer le fournisseur";
        $_SESSION['message']['type'] = "danger";
    }
} else {
    $_SESSION['message']['text'] = "ID de fournisseur manquant";
    $_SESSION['message']['type'] = "danger";
}

// Redirection vers la page de fournisseur
header('Location: ../vue/fournisseur.php');
?>
