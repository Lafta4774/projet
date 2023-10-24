<?php require_once '../models/usersModel.php';
session_start();
$regexname = '/^[a-zA-Z\d_-]+$/';
$user = new users;
$formErrors = [];
if (count($_POST) > 0) {
    if (!empty($_POST['username'])) {
        if (preg_match($regexname, $_POST['username'])) {
            $user->username = $_POST['username'];
            if ($user->checkIfExistsByUsername() == 0) {
                $formErrors['username'] = $formErrors['password'] = "Le nom d'utilisateur ou le mot de passe est incorrect.";
            }
        } else {
            $formErrors['username'] = "Le nom d'utilisateur n'est pas valide. Il peut contenir: des minuscules, des majuscules, des chiffres, des tirets (-), et des underscores (_).";
        }
    } else {
        $formErrors['username'] = "Le nom d'utilisateur est obligatoire.";
    }

    if (!empty($_POST['password'])) {
        $user->password = $_POST['password'];
    } else {
        $formErrors['password'] = "Le mot de passe est obligatoire.";
    }
    if (count($formErrors) == 0) {
        $password = $user->getPassword();
        if (password_verify($_POST['password'], $password)) {
            $_SESSION['user']['id'] = $user->getId();
            $_SESSION['user']['username'] = $_POST['username'];
            header('location:profileController.php');
        } else {
            $formErrors['username'] = $formErrors['password'] = "Le nom d'utilisateur ou le mot de passe est incorrect.";
        }
    }
}
require_once '../views/login.php';