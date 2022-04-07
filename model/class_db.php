<?php

function get_classname($class_id) {
    global $db;
    $query = 'SELECT Class FROM classes
        WHERE ID = :class_id';
    $statement = $db->prepare($query);
    $statement -> bindValue(':class_id', $class_id);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result;
}

function get_classesAll()
{
    global $db;
    $query = 'SELECT * FROM classes';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function delete_class($class_id)
{
    global $db;
    $query = 'DELETE FROM classes
                WHERE (ID = :class_id)';
    $statement = $db->prepare($query);
    $statement -> bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_class($classname)
{
    global $db;
    $query = 'INSERT INTO classes(Class)
                VALUES (:classname)';
    $statement = $db->prepare($query);
    $statement -> bindValue(':classname', $classname);
    $statement->execute();
    $statement->closeCursor();
}

?>