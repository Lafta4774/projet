<?php require_once '../models/questionsModel.php';
session_start();
$question = new questions;
$question->id=$_GET['id'];
$singleQuestion=$question->getSingleQuestion();
require_once '../views/singleQuestion.php';