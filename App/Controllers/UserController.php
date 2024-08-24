<?php

namespace App\Controllers;

use App\Models\User;


class UserController
{

    //Fonction d'affichage de la page
    public function index($id)
    {   
        $userSession = $_SESSION['userSession'];
        $id = $userSession['id_user'] ;
        require_once RACINE . '/App/Views/Profil.php';
    }


    //Fonction d'inscription
    public function userSignUp()
    {
        $msg = null;
        // Récupération des données saisies dans le formulaire
        if (isset($_POST["email"], $_POST["password"], $_POST["last_name"], $_POST["first_name"], $_POST["mobile"])) {
            $mail = htmlspecialchars($_POST["email"]);
            $password = htmlspecialchars($_POST["password"]);
            $last_name = htmlspecialchars($_POST["last_name"]);
            $first_name = htmlspecialchars($_POST["first_name"]);
            $mobile = htmlspecialchars($_POST["mobile"]);

            // Validation des données
            if (empty($mail) || empty($password) || empty($first_name) || empty($last_name)) {
                $msg = 'Veuillez saisir tous les champs';
                
            } elseif (!preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿœŒ\s]+$/', $last_name)) {
                $msg = 'Votre nom ne doit contenir que des lettres';
              
            } elseif (!preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿœŒ\s]+$/', $first_name)) {
                $msg = 'Votre prénom ne doit contenir que des lettres';
             
            } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $msg = 'Veuillez saisir un email valide';
              
            } elseif (strlen($password) < 3) {
                $msg = "Mot de passe trop court, saisissez au moins 3 caractères";
                
            } else {
                // Création de l'utilisateur
                $newUser = new User($mail, $last_name, $first_name, password_hash($password, PASSWORD_DEFAULT), $mobile);
                $newUser->create($newUser);
                $msg = "Inscription réussie !";

                
            }
            header("location: ../home");    
        }

        $_SESSION['msg'] = $msg;
    }


    //Fonction de connexion
    public function userLogin()
    {
        $msg = null;

        if (isset($_POST['mail'], $_POST['passwordCo'])) {
            $mail = htmlspecialchars($_POST["mail"]);
            $password = htmlspecialchars($_POST["passwordCo"]);

            // Validation des données
            if (empty($mail) || empty($password)) {
                $msg = 'Veuillez saisir tous les champs';
            } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $msg = 'Veuillez saisir un email valide';
            } else {
                // Authentification
                $userModel = new User();
                $user = $userModel->findBy(['mail' => $mail]);
                $userPassword = $user[0]["password"];

                if ($user && password_verify($password, $userPassword)) {
                    // Connexion réussie
                    
                    $userSession = $user[0];
                    unset($userSession['password']);
                    $_SESSION['userSession'] = $userSession;

                    $msg = "Connexion réussie !";
                } else {
                    // Connexion échouée
                    $msg = 'Email ou mot de passe incorrect';
                }
            }
            header("location: ../home"); 
        }

        $_SESSION['msg'] = $msg;
        require_once RACINE . "/App/Views/home.php";
        // Redirection vers la page de profil
        // header("Location: /home");
    }

    //Fonction de modification du profil
    public function userUpdate($id){

        $idUser = $_SESSION['idUser'];
        $msgUpdate = null;

        // Récupération des données saisies dans le formulaire
        if (isset($_POST["emailUp"], $_POST["passwordUp"], $_POST["last_nameUp"], $_POST["first_nameUp"], $_POST["mobileUp"])) {
            $mail = htmlspecialchars($_POST["emailUp"]);
            $password = htmlspecialchars($_POST["passwordUp"]);
            $last_name = htmlspecialchars($_POST["last_nameUp"]);
            $first_name = htmlspecialchars($_POST["first_nameUp"]);
            $mobile = htmlspecialchars($_POST["mobileUp"]);

            // Validation des données
            if (empty($mail) || empty($password) || empty($first_name) || empty($last_name)) {
                $msg = 'Veuillez saisir tous les champs';
                
            } elseif (!preg_match("/^[a-zA-Z\d]+$/", $last_name)) {
                $msg = 'Votre nom ne doit contenir que des lettres';
              
            } elseif (!preg_match("/^[a-zA-Z\d]+$/", $first_name)) {
                $msg = 'Votre prénom ne doit contenir que des lettres';
             
            } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $msg = 'Veuillez saisir un email valide';
              
            } elseif (strlen($password) < 3) {
                $msg = "Mot de passe trop court, saisissez au moins 3 caractères";
                
            } else {
                // Mise à jour des inforamtions
                $newUser = new User($mail, $last_name, $first_name, $mobile);
                $newUser->update($idUser, new User());
                $msg = "Modifcation(s) réussie(s) !";
            }  
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']); 
        $_SESSION['msg'] = $msgUpdate;
    }
    


    //Fonction de déconnexion
    public function userLogout($id)
    {   
        $userSession = $_SESSION['userSession'];
        $id = $userSession['id_user'];
        // si les informations de sessions existent :
        if (isset($id)) {
            
            // on efface les données de session
            session_destroy();
        }
        header("location: ../../home");
    }

    public function userDelete($id){
        $id = $_SESSION['idUser'] ;  
    }

    //Affichage vue admin
    public function admin(){
        require RACINE . '/App/Views/admin.php';
    }



}   


