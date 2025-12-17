<?php
if(isset($_GET['query'])) {
    $query = strtolower(trim($_GET['query']));
    
    switch ($query) {
        case "commande":
            header("Location: commande.php");
            exit();
        case "client":
            header("Location: client.php");
            exit();
        case "Fournisseur":
            header("Location: fournisseur.php");
            exit();
        case "vente":
            header("Location: vente.php");
            exit();
        case "article":
            header("Location: article.php");
            exit();
        case "categorie":
            header("Location: categorie.php");
            exit();
        case "dashboard":
                header("Location: dashboard.php");
                exit();
        // Ajoutez d'autres cas au besoin pour d'autres termes de recherche
        default:
            // Rediriger vers une page par défaut ou afficher un message d'erreur
            break;
    }
}
?>
