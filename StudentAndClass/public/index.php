<?php

$url = isset($_GET['url']) ? $_GET['url'] : "";
$method = $_SERVER['REQUEST_METHOD'];
include_once "../Controllers/TotalController.php";
include_once "../Controllers/update-class-controller.php";
include_once "../Controllers/update-student-controller.php";
include_once "../Controllers/join-class-controller.php";
include_once "../Controllers/detail-student-controller.php";
include_once "../Controllers/add-student-to-class-controller.php";
include_once "../Controllers/detail-class-controller.php";
switch ($url) {
    
    case 'students':
        # code...
        switch ($method) {
            case 'GET':
                TotalController::index();
                return;
            case 'POST':
                TotalController::check($_REQUEST);
                return;
        }
    
    case 'updateStudents':
        # code...
        switch ($method) {
            case 'GET':
                TotalController::index();
                return;
            case 'POST':
                UpdateStudentController::index($_REQUEST);
                return;
        }
    case 'updateClasses':
        # code...
        switch ($method) {
            case 'GET':
                TotalController::index();
                return;
            case 'POST':
                UpdateClassController::index($_REQUEST);
                return;
        }
    case 'JoinClass':
        # code...
        switch ($method) {
            case 'GET':
                TotalController::index();
                return;
            case 'POST':
                JoinClassController::index($_REQUEST);
                return;
        }
    case 'DetailStudent':
        # code...
        switch ($method) {
            case 'GET':
                TotalController::index();
                return;
            case 'POST':
                StudentDetailController::index($_REQUEST);
                return;
        }
    case 'addStudentToClass':
        # code...
        switch ($method) {
            case 'GET':
                TotalController::index();
                return;
            case 'POST':
                AddStudentToClassController::index($_REQUEST);
                return;
        }
    case 'DetailClass':
        # code...
        switch ($method) {
            case 'GET':
                TotalController::index();
                return;
            case 'POST':
                ClassDetailController::index($_REQUEST);
                return;
        }
}