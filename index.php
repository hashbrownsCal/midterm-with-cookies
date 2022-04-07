<?php
    require("./model/database.php");
    require("./model/vehicle_db.php");
    require("./model/type_db.php");
    require("./model/make_db.php");
    require("./model/class_db.php");

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

    $makes = get_makesAll();
    $types = get_typesAll();
    $classes = get_classesAll();

switch($action) {
    default:
        include("vehicles_list.php");
        break;
}

?>
