<?php require_once '../models/questionsModel.php';
session_start();
$question = new questions;
$questionList = $question->getList();
require_once '../views/questionList.php';