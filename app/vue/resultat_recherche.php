<?php
if (isset($_GET['recherche']) && isset($_GET['type'])) {
    $recherche = $_GET['recherche'];
    $type = $_GET['type'];

    // Définir l'URL de destination en fonction du type de recherche
    switch ($type) {
        case 'commandes':
            $url = "commande.php?recherche=$recherche";
            break;
        case 'ventes':
            $url = "vente.php?recherche=$recherche";
            break;
        case 'clients':
            $url = "client.php?recherche=$recherche";
            break;
        case 'articles':
            $url = "article.php?recherche=$recherche";
            break;
        case 'categories':
            $url = "categorie.php?recherche=$recherche";
            break;
        default:
            // Rediriger vers une page par défaut si le type de recherche n'est pas valide
            $url = "page_par_defaut.php";
            break;
    }

    // Effectuer la redirection côté client en utilisant JavaScript
    echo "<script>window.location.replace('$url');</script>";
    exit; // Assurez-vous de terminer l'exécution du script PHP après la redirection JavaScript
} else {
    // Rediriger vers une page d'erreur si les paramètres ne sont pas définis
    $url = "erreur.php";
    echo "<script>window.location.replace('$url');</script>";
    exit;
}
?>