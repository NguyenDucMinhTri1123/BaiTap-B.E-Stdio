<?php

$url = isset($_GET['url']) ? $_GET['url'] : "";
$method = $_SERVER['REQUEST_METHOD'];
include_once "../Controllers/TotalController.php";
include_once "../Controllers/update-class-controller.php";
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
                UpdateClassController::index($_REQUEST);
                return;
            case 'POST':
                UpdateClassController::index($_REQUEST);
                return;
        }
}