<?php
include 'connexion.php';

// Vérifier si l'ID de l'article est fourni
if (!empty($_GET['id'])) {
    // Préparer la requête de suppression de l'article
    $sqlDeleteArticle = "DELETE FROM article WHERE id = ?";
    $reqDeleteArticle = $connexion->prepare($sqlDeleteArticle);
    
    // Exécuter la requête en passant l'ID de l'article
    $reqDeleteArticle->execute(array($_GET['id']));

    // Vérifier si l'article est supprimé avec succès
    if ($reqDeleteArticle->rowCount() != 0) {
        $_SESSION['message']['text'] = "Article supprimé avec succès";
        $_SESSION['message']['type'] = "success";
    } else {
        $_SESSION['message']['text'] = "Impossible de supprimer l'article";
        $_SESSION['message']['type'] = "danger";
    }
} else {
    $_SESSION['message']['text'] = "ID d'article manquant";
    $_SESSION['message']['type'] = "danger";
}

// Rediriger vers la page d'article après la suppression
header('Location: ../vue/article.php');
?>