<?php require_once '../models/usersModel.php';
session_start();
$regexname = '/^[a-zA-Z\d_-]+$/';
$regexpassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,255}$/';
$user = new users;
if (!isset($_SESSION['user']['id'])) {
    header('location:loginController.php');
    exit;
}
$user->id = $_SESSION['user']['id'];
if (isset($_POST['updateUsername'])) {
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
    if (empty($formErrors)) {
        $user->updateUsername();
        $_SESSION['user']['username'] = $_POST['username'];
    }
}
if (isset($_POST['updateEmail'])) {
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
    if (empty($formErrors)) {
        $user->updateEmail();
    }
}
if (isset($_POST['updatePassword'])) {
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
        $user->updatePassword();
    }
}
if (isset($_POST['confirmDelete'])) {
    $user->delete();
    session_start();
    unset($_SESSION);
    session_destroy();
    header('location:loginController.php');
}
$userInfo = $user->getInfo();
require_once '../views/profile.php';
