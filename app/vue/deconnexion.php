<?php
// Démarrez la session (si ce n'est pas déjà fait)
session_start();

// Détruire toutes les données de la session
session_destroy();

// Rediriger vers une page d'accueil ou une page de connexion
header("Location: connection.php");
exit;
?>
