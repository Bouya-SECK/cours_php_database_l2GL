<?php

require_once('../../config/database/users_db.php'); // Connexion à la base de données

if (isset($_POST['send'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password']; // Mot de passe saisi
        
        // Récupérer les informations de l'utilisateur
        $result = getUsersByEmail($email);

        if ($result->rowCount() > 0) 
        {   
            //userInfos est un tableau qui contient tout les informations
            // de l'utilisateur qui s'est connecté
            //fetch(PDO::FETCH_OBJ) permet de récuperer une ligne
            $userInfos = $result->fetch(PDO::FETCH_OBJ);

            // Vérification du mot de passe : on compare avec le mot de passe haché 
            if (password_verify($password, $userInfos->motdepasse)) 
            {
                session_start();// on demarre la session
                $_SESSION['isLogin'] = true;// on indique qu'un user s'est connecté
                $_SESSION['role'] = $userInfos->id_role;
                $_SESSION['nom'] = $userInfos->nom;
                $_SESSION['prenom'] = $userInfos->prenom;

                header('location: /index.php'); // Redirection vers l'accueil
                exit();
            } else {
                $errorMessage = 'Mot de passe incorrect';
            }
        } else {
            $errorMessage = 'Email introuvable';
        }
    } else {
        $errorMessage = 'Veuillez remplir tous les champs';
    }
}
?>



?>