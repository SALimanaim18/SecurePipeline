<?php
include 'connexion.php';

if (!empty($_GET['id_categorie'])) {
    $id_categorie = $_GET['id_categorie'];

    // Supprimer tous les articles associés à la catégorie
    $sqlDeleteArticles = "DELETE FROM article WHERE id_categorie = ?";
    $reqDeleteArticles = $connexion->prepare($sqlDeleteArticles);
    $reqDeleteArticles->execute(array($id_categorie));

    // Supprimer la catégorie elle-même
    $sqlDeleteCategorie = "DELETE FROM categorie_article WHERE id = ?";
    $reqDeleteCategorie = $connexion->prepare($sqlDeleteCategorie);
    $reqDeleteCategorie->execute(array($id_categorie));

    // Si la catégorie et ses articles sont supprimés avec succès
    if ($reqDeleteCategorie->rowCount() != 0) {
        $_SESSION['message']['text'] = "Catégorie et ses articles associés supprimés avec succès";
        $_SESSION['message']['type'] = "success";
    } else {
        $_SESSION['message']['text'] = "Impossible de supprimer la catégorie et ses articles associés";
        $_SESSION['message']['type'] = "danger";
    }
} else {
    $_SESSION['message']['text'] = "ID de catégorie manquant";
    $_SESSION['message']['type'] = "danger";
}

// Redirection vers la page de catégorie
header('Location: ../vue/categorie.php');
?>
