<?php
include 'connexion.php';

if (
    !empty($_GET['idVente']) &&
    !empty($_GET['idArticle']) &&
    !empty($_GET['quantite'])
) {

    // Supprimer la vente
    $sqlDeleteVente = "DELETE FROM vente WHERE id = ?";
    $reqDeleteVente = $connexion->prepare($sqlDeleteVente);
    $reqDeleteVente->execute(array($_GET['idVente']));

    // Si la vente a été supprimée avec succès
    if ($reqDeleteVente->rowCount() != 0) {
        // Mettre à jour la quantité de l'article
        $sqlUpdateQuantiteArticle = "UPDATE article SET quantite = quantite + ? WHERE id = ?";
        $reqUpdateQuantiteArticle = $connexion->prepare($sqlUpdateQuantiteArticle);
        $reqUpdateQuantiteArticle->execute(array($_GET['quantite'], $_GET['idArticle']));
    }
}

// Redirection vers la page de vente
header('Location: ../vue/vente.php');