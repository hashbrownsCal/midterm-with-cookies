<?php
    require("../model/database.php");
    require("../model/vehicle_db.php");
    require("../model/type_db.php");
    require("../model/make_db.php");
    require("../model/class_db.php");

    $action = filter_input(INPUT_POST,'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET,'action');
        if ($action == NULL) {
            $action = "list_vehicles";
        }
    }
    $make_id = filter_input(INPUT_POST,'make_id');
    if ($make_id == NULL) {
        $make_id = filter_input(INPUT_GET,'make_id');
        if ($make_id == NULL) {
            $make_id = 0;
        }
    }
    $type_id = filter_input(INPUT_POST,'type_id');
    if ($type_id == NULL) {
        $type_id = filter_input(INPUT_GET,'type_id');
        if ($type_id == NULL) {
            $type_id = 0;
        }
    }
    $class_id = filter_input(INPUT_POST,'class_id');
    if ($class_id  == NULL) {
        $class_id  = filter_input(INPUT_GET,'class_id');
        if ($class_id == NULL) {
            $class_id = 0;
        }
    }
    $sort_by = filter_input(INPUT_POST,'sort_by');
    if ($sort_by  == NULL) {
        $sort_by  = filter_input(INPUT_GET,'sort_by');
        if ($sort_by == NULL) {
            $sort_by = "sort_by_price";
        }
    }
    $year = filter_input(INPUT_POST,'year', FILTER_VALIDATE_INT);
    if ($year  == NULL) {
        $year = filter_input(INPUT_GET,'year', FILTER_VALIDATE_INT);
    }
    $model = filter_input(INPUT_POST,'model');
    if ($model  == NULL) {
        $model = filter_input(INPUT_GET,'model');
    }
    $price = filter_input(INPUT_POST,'price', FILTER_VALIDATE_INT);
    if ($price  == NULL) {
        $price = filter_input(INPUT_GET,'price', FILTER_VALIDATE_INT);
    }
    $classname = filter_input(INPUT_POST,'classname');
    if ($classname  == NULL) {
        $classname = filter_input(INPUT_GET,'classname');
    }
    $makename = filter_input(INPUT_POST,'makename');
    if ($makename  == NULL) {
        $makename = filter_input(INPUT_GET,'makename');
    }
    $typename = filter_input(INPUT_POST,'typename');
    if ($typename  == NULL) {
        $typename = filter_input(INPUT_GET,'typename');
    }

    $makes = get_makesAll();
    $types = get_typesAll();
    $classes = get_classesAll();

switch($action) {
    case "list_vehicles":
        include("admin_vehicles_list.php");
        break;
    case "show_add_form":
        include("admin_add_vehicle.php");
        break;
    case "add_vehicle":
        if ($make_id == NULL || $type_id == NULL || $class_id == NULL || $year == Null || $year == FALSE || $model == NULL || $price == NULL || $price == FALSE) {
            $error = "Invalid input. Please try again.";
            include('../view/error.php');
        }
        else {
            add_vehicle($make_id, $type_id, $class_id, $year, $model, $price);
            header("Location: ./admin.php");
        }
        break;
    case "delete_vehicle":
        if ($make_id == NULL || $type_id == NULL || $class_id == NULL || $year == Null || $year == FALSE || $model == NULL || $price == NULL || $price == FALSE) {
            $error = "Invalid input. Please try again.";
            include('../view/error.php');
        }
        else {
            delete_vehicle($make_id, $type_id, $class_id, $year, $model, $price);
            header("Location: ./admin.php");
        }
        break;
    case "show_class_form":
        include("admin_edit_classes.php");
        break;
    case "delete_class":
        if ($class_id == NULL) {
            $error = "Invalid input. Please try again.";
            include('../view/error.php');
        }
        else {
            delete_class($class_id);
            header("Location: ./admin.php?action=show_class_form");
        }
        break;
    case "add_class":
        if ($classname == NULL) {
            $error = "Invalid input. Please try again.";
            include('../view/error.php');
        }
        else {
            add_class($classname);
            header("Location: ./admin.php?action=show_class_form");
        }
        break;
    case "show_make_form":
        include("admin_edit_makes.php");
        break;
    case "delete_make":
        if ($make_id == NULL) {
            $error = "Invalid input. Please try again.";
            include('../view/error.php');
        }
        else {
            delete_make($make_id);
            header("Location: ./admin.php?action=show_make_form");
        }
        break;
    case "add_make":
        if ($makename == NULL) {
            $error = "Invalid input. Please try again.";
            include('../view/error.php');
        }
        else {
            add_make($makename);
            header("Location: ./admin.php?action=show_make_form");
        }
        break;
    case "show_type_form":
        include("admin_edit_types.php");
        break;
    case "delete_type":
        if ($type_id == NULL) {
            $error = "Invalid input. Please try again.";
            include('../view/error.php');
        }
        else {
            delete_type($type_id);
            header("Location: ./admin.php?action=show_type_form");
        }
        break;
    case "add_type":
        if ($typename == NULL) {
            $error = "Invalid input. Please try again.";
            include('../view/error.php');
        }
        else {
            add_type($typename);
            header("Location: ./admin.php?action=show_type_form");
        }
        break;
    default:
        include("admin_vehicles_list.php");
        break;
}

?>