<?php require_once '../models/categoriesModel.php';
require_once '../models/questionsModel.php';
session_start();
$question = new questions;
$category = new categories;
$categoriesList = $category->getList();
$regexquestion = '/^[À-ÿ \.,?!\w-]+$/';
$regexcategories = '/^\d+$/';
$formErrors = [];
if(!isset($_SESSION['user']['id'])){
    header('location:loginController.php');
    exit;
}
if (count($_POST) > 0) {
    if (!empty($_POST['title'])) {
        if (preg_match($regexquestion, $_POST['title'])) {
            $question->title = $_POST['title'];
        } else {
            $formErrors['title'] = "Le titre n'est pas valide.";
        }
    } else {
        $formErrors['title'] = "Veuillez mettre un titre.";
    }
    if (!empty($_POST['categories'])) {
        if (preg_match($regexcategories, $_POST['categories'])) {
            if (array_key_exists($_POST['categories'], $categoriesList)) {
                $question->id_categories = $_POST['categories'];
            } else {
                $formErrors['categories'] = "Veuillez choisir une catégorie dans la liste.";
            }
        } else {
            $formErrors['categories'] = "Veuillez choisir une catégorie dans la liste.";
        }
    } else {
        $formErrors['categories'] = "Veuillez mettre une catégorie.";
    }
    if (!empty($_POST['content'])) {
        $question->content = strip_tags($_POST['content']);
    } else {
        $formErrors['content'] = "Veuillez ajouter une description.";
    }
    if (count($formErrors) == 0) {
        $question->id_users = $_SESSION['user']['id'];
        $question->add();
    }
}
require_once '../views/addQuestion.php';