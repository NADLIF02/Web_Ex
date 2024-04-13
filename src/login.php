<?php
$servername = "localhost";
$username = "votre_nom_utilisateur";
$password = "votre_mot_de_passe";
$dbname = "votre_base_de_donnees";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupérer les données de formulaire
$user = $_POST['username'];
$pass = $_POST['password'];

// Vérifier les identifiants dans la base de données
$sql = "SELECT * FROM utilisateurs WHERE username='$user' AND password='$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Connexion réussie!";
    // Initier une session ou rediriger vers une autre page
} else {
    echo "Identifiant ou mot de passe incorrect.";
}
$conn->close();
?>
