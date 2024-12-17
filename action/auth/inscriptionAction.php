<?php
require_once('../../config/database/users_db.php');

if(isset($_POST['ajouter'])) 
{
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['statut'])) 
    {
        $nom = securisation($_POST['nom']);
        $prenom = securisation($_POST['prenom']);
        $email = securisation($_POST['email']);
        $password = securisation($_POST['password']);
        $statut = securisation($_POST['statut']);

        // Ajout de l'utilisateur à la base de données
        addStUser($nom, $prenom, $email, $password, $statut);

        // Redirection avec message de succès
        header("location:../../views/users/liste.php?success=1&prenom=$prenom&nom=$nom");
        exit;
    } 
    else 
    {
        header('location:../../views/users/inscription.php');
    }
}
