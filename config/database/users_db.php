<?php
require('database_connexion.php');

function getUsersByEmail($email) 
{
    global $connexion;
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($email));
    return $stmt;
}

function getAllUsers()
{
    global $connexion;
    $query = "SELECT users.id, nom, prenom, email, roles.designation
              FROM users 
              INNER JOIN roles ON users.id_role = roles.id";
    $stmt = $connexion->prepare($query);
    $stmt->execute();
    return $stmt;
    
}

function addStUser($nom, $prenom, $email, $motdepasse, $statut)
{
    global $connexion;
    try {
        // Convertir le statut (admin/user) en ID numérique
        $id_role = ($statut === 'admin') ? 1 : 2;

        // Hacher le mot de passe
        $hashedPassword = password_hash($motdepasse, PASSWORD_BCRYPT);

        // Préparer la requête d'insertion
        $sql = "INSERT INTO users (nom, prenom, email, motdepasse, id_role) 
                VALUES (:nom, :prenom, :email, :motdepasse, :id_role)";
        
        $stmt = $connexion->prepare($sql);
        
        // Lier les paramètres à leurs valeurs
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':motdepasse', $hashedPassword); // Utiliser le mot de passe haché
        $stmt->bindParam(':id_role', $id_role);
        
        // Exécuter la requête
        $stmt->execute();
        
        echo "Student added successfully!";
    } catch (PDOException $e) {
        // Gérer les erreurs
        echo "Error: " . $e->getMessage();
    }
}



function securisation($donnees)
{
    $donnees = trim($donnees);                    // Supprime les espaces inutiles
    $donnees = stripslashes($donnees);            // Supprime les antislashs
    $donnees = strip_tags($donnees);              // Supprime les balises HTML et PHP
    $donnees = htmlspecialchars($donnees, ENT_QUOTES, 'UTF-8');  // Encode les caractères spéciaux
    return $donnees;
}
