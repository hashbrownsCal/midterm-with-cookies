<?php

function get_vehicles_price()
{
    global $db;
    $query = 'SELECT * FROM vehicles
        ORDER BY price DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function get_vehicles_bymake_price($make_id)
{
    global $db;
    $query = 'SELECT * FROM vehicles
        WHERE make_id = :make_id
        ORDER BY price DESC';
    $statement = $db->prepare($query);
    $statement -> bindValue(':make_id', $make_id);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function get_vehicles_bytype_price($type_id)
{
    global $db;
    $query = 'SELECT * FROM vehicles
        WHERE type_id = :type_id
        ORDER BY price DESC';
    $statement = $db->prepare($query);
    $statement -> bindValue(':type_id', $type_id);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function get_vehicles_byclass_price($class_id)
{
    global $db;
    $query = 'SELECT * FROM vehicles
        WHERE class_id = :class_id
        ORDER BY price DESC';
    $statement = $db->prepare($query);
    $statement -> bindValue(':class_id', $class_id);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function get_vehicles_year()
{
    global $db;
    $query = 'SELECT * FROM vehicles
        ORDER BY year DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function get_vehicles_bymake_year($make_id)
{
    global $db;
    $query = 'SELECT * FROM vehicles
        WHERE make_id = :make_id
        ORDER BY year DESC';
    $statement = $db->prepare($query);
    $statement -> bindValue(':make_id', $make_id);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function get_vehicles_bytype_year($type_id)
{
    global $db;
    $query = 'SELECT * FROM vehicles
        WHERE type_id = :type_id
        ORDER BY year DESC';
    $statement = $db->prepare($query);
    $statement -> bindValue(':type_id', $type_id);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function get_vehicles_byclass_year($class_id)
{
    global $db;
    $query = 'SELECT * FROM vehicles
        WHERE class_id = :class_id
        ORDER BY year DESC';
    $statement = $db->prepare($query);
    $statement -> bindValue(':class_id', $class_id);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function add_vehicle($make_id, $type_id, $class_id, $year, $model, $price)
{
    global $db;
    $query = 'INSERT INTO vehicles(class_id, make_id, model, price, type_id, year)
                VALUES (:class_id, :make_id, :model, :price, :type_id, :year)';
    $statement = $db->prepare($query);
    $statement -> bindValue(':class_id', $class_id);
    $statement -> bindValue(':make_id', $make_id);
    $statement -> bindValue(':model', $model);
    $statement -> bindValue(':price', $price);
    $statement -> bindValue(':type_id', $type_id);
    $statement -> bindValue(':year', $year);
    $statement->execute();
    $statement->closeCursor();
}

function delete_vehicle($make_id, $type_id, $class_id, $year, $model, $price)
{
    global $db;
    $query = 'DELETE FROM vehicles
                WHERE (class_id = :class_id AND make_id = :make_id AND model = :model AND price = :price AND type_id = :type_id AND year = :year)';
    $statement = $db->prepare($query);
    $statement -> bindValue(':class_id', $class_id);
    $statement -> bindValue(':make_id', $make_id);
    $statement -> bindValue(':model', $model);
    $statement -> bindValue(':price', $price);
    $statement -> bindValue(':type_id', $type_id);
    $statement -> bindValue(':year', $year);
    $statement->execute();
    $statement->closeCursor();
}

/* function get_category($category_id)
{
    if (!$category_id) {
        return "All Categories";
    }
    global $db;
    $query = 'SELECT * FROM categories
                WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement -> bindValue(':category_id', $category_id);
    $statement->execute();
    $results = $statement->fetch();
    $statement->closeCursor();
    $results_name = $results['categoryName'];
    return $results_name;
}

function delete_category($category_id)
{
    global $db;
    $query = 'DELETE FROM categories
                WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement -> bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_category($categoryName)
{
    global $db;
    $query = 'INSERT INTO categories (categoryName)
                VALUES (:categoryName)';
    $statement = $db->prepare($query);
    $statement -> bindValue(':categoryName', $categoryName);
    $statement->execute();
    $statement->closeCursor();
} */

?>