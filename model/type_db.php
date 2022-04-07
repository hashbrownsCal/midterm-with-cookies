<?php

function get_type($type_id) {
    global $db;
    $query = 'SELECT Type FROM types
        WHERE ID = :type_id';
    $statement = $db->prepare($query);
    $statement -> bindValue(':type_id', $type_id);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result;
}

function get_typesAll()
{
    global $db;
    $query = 'SELECT * FROM types';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function delete_type($type_id)
{
    global $db;
    $query = 'DELETE FROM types
                WHERE (ID = :type_id)';
    $statement = $db->prepare($query);
    $statement -> bindValue(':type_id', $type_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_type($typename)
{
    global $db;
    $query = 'INSERT INTO types(Type)
                VALUES (:typename)';
    $statement = $db->prepare($query);
    $statement -> bindValue(':typename', $typename);
    $statement->execute();
    $statement->closeCursor();
}
?>