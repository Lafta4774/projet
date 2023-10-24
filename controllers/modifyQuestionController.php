<?php require_once '../models/questionsModel.php';
require_once '../models/categoriesModel.php';
session_start();
$question = new questions;
$category = new categories;
$regexquestion = '/^[À-ÿ \.,?!\w-]+$/';
$regexcategories = '/^\d+$/';
$question->id=$_GET['id'];
$singleQuestion=$question->getSingleQuestion();
$categoriesList = $category->getList();
$formErrors = [];
if(!isset($_SESSION['user']['id'])){
    header('location:loginController.php');
    exit;
}
if($_SESSION['user']['id']!=$singleQuestion->id_users){
    header('location:questionListController.php');
    exit;
}
if (isset($_POST['update'])) {
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
        $question->modify();
    }
}
if(isset($_POST['confirmDelete'])){
    $question->delete();
    header('location:questionListController.php');
    exit;
}
$singleQuestion=$question->getSingleQuestion();
require_once '../views/modifyQuestion.php';