<?php require_once '../models/usersModel.php';
session_start();
$regexname = '/^[a-zA-Z\d_-]+$/';
$regexpassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,255}$/';
if (count($_POST) > 0) {
    $user = new users;
    if (!empty($_POST['username'])) {
        if (preg_match($regexname, $_POST['username'])) {
            $user->username = $_POST['username'];
            if ($user->checkIfExistsByUsername() > 0) {
                $formErrors['username'] = "Ce nom d'utilisateur est déjà pris.";
            }
        } else {
            $formErrors['username'] = "Le nom d'utilisateur n'est pas valide. Il peut contenir: des minuscules, des majuscules, des chiffres, des tirets (-), et des underscores (_).";
        }
    } else {
        $formErrors['username'] = "Le nom d'utilisateur est obligatoire.";
    }

    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user->email = $_POST['email'];
            if ($user->checkIfExistsByEmail() > 0) {
                $formErrors['email'] = "L'adresse mail a déjà un compte enregisté.";
            }
        } else {
            $formErrors['email'] = "L'adresse mail n'est pas valide.";
        }
    } else {
        $formErrors['email'] = "L'adresse mail est obligatoire.";
    }
    if (!empty($_POST['confirmPassword'])) {
        if ($_POST['password'] != $_POST['confirmPassword']) {
            $formErrors['confirmPassword'] = "Le mot de passe n'est pas confirmé correctement. Veuillez mettre le même mot de passe dans les deux champs.";
        }
    } else {
        $formErrors['confirmPassword'] = "Veuillez confirmer votre mot de passe.";
    }

    if (!empty($_POST['password'])) {
        if (preg_match($regexpassword, $_POST['password'])) {
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            $formErrors['password'] = "Le mot de passe n'est pas valide. Il doit contenir au moins 8 caractères, dont une lettre minuscule, une lettre majuscule et un chiffre.";
        }
    } else {
        $formErrors['password'] = "Le mot de passe est obligatoire.";
    }

    if (empty($formErrors)) {
        $user->add();
        header('location:loginController.php');
    }
}
require_once '../views/register.php';
